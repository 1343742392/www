#include <stdio.h>
int main() 
{
  float radius, height, vol;
  float volume(float, float);
  printf("Please input the radius and height:\n");
  scanf("%f%f", &radius, &height);
  vol = volume(radius, height);
  printf("volume=%f\n", vol);
}
float volume(float r, float h) 
{
  float temp;
  float pi = 3.1415926;
  temp = pi * r * r * h;
  return temp;
}

