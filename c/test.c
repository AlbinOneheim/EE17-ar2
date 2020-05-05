#include <stdio.h>
#include <stdlib.h>
#include <ctype.h>
#include <string.h>
#include <math.h>
<<<<<<< HEAD
#include <time.h>

int main(void)
{   
    srand(time(NULL));
    int roll = rand();
    printf("rand MAX %d int roll %d\n", RAND_MAX, roll);

    for (int i = 0; i < 10; i++)
    {
        int x = 7;
        while (x > 6)
        {
            x = 1 + rand()/((RAND_MAX + 1u) / 6);
            printf("%d ", x);
        }
        
    }
    
=======

int main(void)
{
>>>>>>> 0682eef1c5d817279cfc931dc491edefaaed29d0
    

    return 0;
}