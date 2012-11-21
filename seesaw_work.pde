
//Attaching js code to the canvas by using a sketch object

int col = 0;
float coord_x=0;
int coord_y=0;
float maxang=12;
float minang=-12;
float angle = radians(minang);
float seesawwidth;
float seesawheight;
float da = 0.0;
float angleChange = -0.01;
float dy = 0;
float imgX=0;
float imgY=0;
int x_offset=25;
int y_offset=25;
int offset = 125;
boolean overLeftButton = false;
boolean overRightButton = false;

/* @pjs preload="life_text.png, work_text.png"; */
/* @pjs transparent="true"; */
PImage a, b; 

void setup() {
  size(400, 100);
  frameRate(60);
  smooth();
  stroke(col); 
  seesawwidth = 0.75 * width;
  seesawheight = 0.1 * height;
  mouseX=0;
  a = loadImage("work_text.png");
  b = loadImage("life_text.png");
}



void draw() {

  background(0, 0);  // transparent grey background
  //background(0,0);
  pushMatrix();
  translate(200, 54);
  imageMode(CENTER);
  imgX = offset*cos(angle);
  imgY = offset*sin(angle);
  image(a, -imgX, (-imgY-20));
  popMatrix();
  pushMatrix();
  translate(200, 54);
  image(b, imgX, (imgY-20));
  popMatrix();
  pushMatrix();
  translate(200, 54);
  rectMode(CENTER);
  rotate(angle);
  rect(coord_x, coord_y, seesawwidth, seesawheight);
  popMatrix();
  angle=angle+da;
  pushMatrix();
  translate(200, 75);
  ellipseMode(CENTER);
  ellipse(coord_x, coord_y, 30, 30);
  popMatrix();
  da=angleChange;
  
  if (mouseX > x_offset && (mouseX < width/2) &&

    (mouseY) > y_offset && (mouseY <(height-y_offset))) {

    overLeftButton = true;
    overRightButton = false;
  }  
  else if ((mouseX > width/2) && (mouseX < (width-x_offset)) &&

    (mouseY > y_offset) && (mouseY <height-y_offset)) {

    overRightButton = true;
    overLeftButton = false;
  
  } 
  else {

    overLeftButton = overRightButton = false;
   
  }

  
  if (angle<=radians(minang)) {
    da=0;
  
    
  }


  if (mouseX>(width/2)&& (mouseX<(width-10)) && mouseY<(height-y_offset) && mouseY>y_offset ) {
    da=-1*angleChange;
  }   
  if (angle>=radians(maxang)) {
    da=0;
    if (overLeftButton ==false && overRightButton == false) {
      da=angleChange;
    }
  }
  if (mouseX<(width/2) && mouseX>x_offset && mouseY<(height-y_offset) && mouseY>y_offset && angle>radians(minang)) {
    da=angleChange;
  }

}

void mousePressed() {
  if (overLeftButton) {
    link("javascript:getmenuoptions('resume',timeclass,'work')");
  }
  else if (overRightButton) {
    link("javascript:getmenuoptions('technology',timeclass,'life')");
  }
}









