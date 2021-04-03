#include "opencv2/objdetect.hpp"
#include "opencv2/highgui.hpp"
#include "opencv2/imgproc.hpp"
#include <iostream>
#include <stdio.h>
#include <wiringPi.h>
#include <raspicam/raspicam_cv.h>
#include <unistd.h>

using namespace std;
using namespace cv;

bool button;
int cnt = 0;
/**Function Headers */
void detectAndDisplay(Mat& frame);
/**Global variables*/
String face_cascade_name = "/usr/local/share/OpenCV/haarcascades/haarcascade_frontalface_alt_tree.xml";
CascadeClassifier face_cascade;

/**@function main*/
int main(void)
{
    //VideoCapture capture;
    raspicam::RaspiCam_Cv Camera;
    Mat frame, image;
    int LED = 18;
    int BUTTON = 24;

    if(wiringPiSetupGpio()==-1)
        return 1;

    pinMode(BUTTON, INPUT);
    pinMode(LED, OUTPUT);

    //-- 1. Load the cascades
    if(!face_cascade.load(face_cascade_name))
    {
        printf("--(1)Error loading face cascade\n");
        return -1;
    }
    //-- 2. Read the video stream
    Camera.set(CV_CAP_PROP_FORMAT, CV_8UC3);
    Camera.set(CV_CAP_PROP_FRAME_WIDTH, 640);
    Camera.set(CV_CAP_PROP_FRAME_HEIGHT, 480);

    if(!Camera.open())
    {
        cerr<<"Error opening the camera"<<endl;
        return -1;
    }

    while(1)
    {
        Camera.grab();
        Camera.retrieve(frame);
        if(frame.empty())
            break;

        if(digitalRead(BUTTON))
        {
            button=true;
            digitalWrite(LED, 1);
        }

        Mat frame1 = frame.clone();
        //-- 3. Apply the classifier to the frame
        detectAndDisplay(frame1);
        digitalWrite(LED, 0);
        if(waitKey(20) == 27)
            break;//escape
    }
    Camera.release();

    return 0;
}

/** @function detectAndDisplay */
void detectAndDisplay(Mat& frame)
{
    std::vector<Rect> faces;
    Mat frame_gray;
    IplImage* bgr_frame;
    IplImage copy;
    char add[30];

    cvtColor(frame, frame_gray, COLOR_BGR2GRAY);
    equalizeHist(frame_gray, frame_gray);
    //--Detect faces
    face_cascade.detectMultiScale(frame_gray, faces, 1.1, 2, 0|CASCADE_SCALE_IMAGE, Size(30,30));
    
    for(size_t i = 0; i < faces.size(); i++)
    {
        Point center(faces[i].x + faces[i].width/2, faces[i].y + faces[i].height/2);
        ellipse(frame, center, Size(faces[i].width/2, faces[i].height/2), 0, 0, 360, Scalar(255, 0, 255), 4, 8, 0);
    }
    
    //--Show what you got
    copy = frame;
    bgr_frame = &copy;
    cvSaveImage("/var/www/html/capture/capture.jpg", bgr_frame);
    sleep(0.1);
    //imshow("face detect",frame);

    if(button){
        cnt++;
        sprintf(add, "/var/www/html/log/%d.jpg", cnt);
        cvSaveImage(add, bgr_frame);
        printf("%s\n",add);
        button=false;
    }
}