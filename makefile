prog:main.o photo.o 
	gcc main.o photo.o -o prog -lSDL -lSDL_image -g
main.o:main.c
	gcc -c main.c -g
photo.o:photo.c
	gcc -c photo.c -g
