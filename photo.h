#ifndef Image_H
#define Image_H
#include <SDL/SDL.h>
#include <SDL/SDL_image.h>
#define SCREEN_W 600
#define SCREEN_H 600

struct Image
{
 SDL_Rect pos1;
 SDL_Rect pos2;
 SDL_Surface *img;
 SDL_Surface *Bal;
};
typedef struct Image Image;

void initPlayer(Image *Bal);
void initBackground(Image *Backg);
void liberer(Image Bal);
void afficher(Image Bal,SDL_Surface *screen);

#endif

