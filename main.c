#include <stdio.h>
#include <stdlib.h>
#include <SDL/SDL.h>
#include "photo.h"
#include <SDL/SDL_image.h>

int main()
{
 SDL_Init(SDL_INIT_VIDEO);
 SDL_Surface *screen;
 SDL_Rect pos;
 int Boucle=-1;
 Image Bal,Backg;
 SDL_Event event;
 screen=SDL_SetVideoMode(SCREEN_W,SCREEN_H,32,SDL_HWSURFACE | SDL_DOUBLEBUF);
 if(!screen)
{
 printf("Error: %s\n", SDL_GetError());
 return 1;
}
//Initi varia 
initBackground(&Backg);
initPlayer(&Bal);
//Game Loop
while (Boucle==-1)
{
 afficher(Backg,screen);
 afficher(Bal,screen);
 SDL_Flip(screen);}

 while(SDL_PollEvent(&event))
{
 switch(event.type)
{ 
      
        case SDL_QUIT :
        {
          Boucle=0; 
break;
        }
 case SDL_KEYDOWN:
{
 switch(event.key.keysym.sym)
{
 case SDLK_a:
{ Bal->pos1.x=450;  
 Bal->pos1.y=150;
 Bal->pos1.w=0;
 Bal->pos1.h=Bal->img->h;
 
 
 Bal->pos2.x=0;  
 Bal->pos2.y=0;
 Bal->pos2.w=0;
 Bal->pos2.h=Bal->img->h;
break;}

case SDLK_b:
{ Bal->pos1.x=150;  
 Bal->pos1.y=450;
 Bal->pos1.w=0;
 Bal->pos1.h=Bal->img->h;
 
 
 Bal->pos2.x=0;  
 Bal->pos2.y=0;
 Bal->pos2.w=0;
 Bal->pos2.h=Bal->img->h;
break;}
case SDLK_c:
 {
 Bal->pos1.x=450;  
 Bal->pos1.y=450;
 Bal->pos1.w=0;
 Bal->pos1.h=Bal->img->h;
 
 
 Bal->pos2.x=0;  
 Bal->pos2.y=0;
 Bal->pos2.w=0;
 Bal->pos2.h=Bal->img->h;
break;}
case SDLK_d:
{ Bal->pos1.x=150;  
 Bal->pos1.y=150;
 Bal->pos1.w=0;
 Bal->pos1.h=Bal->img->h;
 
 
 Bal->pos2.x=0;  
 Bal->pos2.y=0;
 Bal->pos2.w=0;
 Bal->pos2.h=Bal->img->h;
break;}
}}}}
liberer(Bal);
liberer(Backg);

return 0 ;
 }

 
