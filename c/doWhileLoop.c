#include <stdio.h>
#include <stdlib.h>
#include <ctype.h>
#include <string.h>
#include <math.h>

int main()
{    
    int room;
    int rooms = 1;

    printf("book one room between 1 och 10 ");
    scanf("%d", &room);

    do
    {
        if (rooms == room || rooms == room)
        {
            rooms++;
            continue;
        }

        printf("Rpoms %d is available \n", rooms);
        rooms++;
        
    } while (rooms <= 10);
    
      printf("Room %d is booked", room);
      
    return 0;
}