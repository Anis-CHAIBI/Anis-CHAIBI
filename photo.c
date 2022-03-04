#include <SDL/SDL.h>
#include "photo.h"
#include <SDL/SDL_image.h>

void initPlayer(Image *Bal)
{
 Bal->img=IMG_Load("balloon.png");
 if(Bal->img==NULL)
{
 return;
}

 Bal->pos1.x=150;  
 Bal->pos1.y=150;
 Bal->pos1.w=50;
 Bal->pos1.h=Bal->img->h;
 
 
 Bal->pos2.x=0;  
 Bal->pos2.y=0;
 Bal->pos2.w=0;
 Bal->pos2.h=Bal->img->h;
}
void initBackground(Image *Backg)
{
 Backg->img=IMG_Load("index.jpg");

 if(Backg->img==NULL)
{
 printf("Unable to load : %s\n", SDL_GetError());
 return;
}

  Backg->pos1.x=0;  
 Backg->pos1.y=0;
 Backg->pos2.x=0;  
 Backg->pos2.y=0;
 Backg->pos2.w=SCREEN_W; 
 Backg->pos2.h=SCREEN_H;
}
void liberer(Image Bal)
{
 SDL_FreeSurface(Bal.img);
}
void afficher(Image Bal,SDL_Surface *screen)
{
 SDL_BlitSurface(Bal.img,&Bal.pos2,screen,&Bal.pos1);
}
