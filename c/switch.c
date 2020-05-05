#include <stdio.h>
#include <stdlib.h>
#include <ctype.h>
#include <string.h>
#include <math.h>

int main()
{    
    char grade = 'E';

    switch (grade)
    {
    case 'A' : 
        printf("Nice nerD \n");
        break;
    case 'B' :
        printf("Could have trieD harder \n");
        break;

    case 'C' :
        printf("I see you didn't study \n");
        break;
    
    case 'D' :
        printf("You love the D");
        break;
    
    case 'F' :
        printf("That's embaressing");
        break;

    default : 
        printf("That doesn't even make sense");
    }

    return 0;
}