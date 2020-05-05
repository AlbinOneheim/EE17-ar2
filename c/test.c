#include <stdio.h>
#include <stdlib.h>
#include <ctype.h>
#include <string.h>
#include <math.h>
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
    
    

    return 0;
}