#include <stdio.h>
#include <stdlib.h>
#include <ctype.h>
#include <string.h>
#include <math.h>

int main(void)
{
    int i;
    int number[5];
    int total = 0;

    for (i = 0; i < 5; i++)
    {
        printf("Typ a number for number %d \n", i + 1);
        scanf("%d", &number[i]);
    }
   
    for (i = 0; i < 5; i++)
    {
        total += number[i];
    }
   
    int avg = total / 5;
    printf("Avrage of the numbers is %d", avg);

    return 0;
}
