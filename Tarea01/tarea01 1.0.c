#include <stdio.h>
#include <string.h>
#include <stdlib.h>

int main (int argc, char *argv[]){
		// Inicializaccion lectura y escritura
		FILE *fp;
		char *linea = NULL;
		size_t len=0;
		ssize_t read;

		// Inicializacion contadores
		int horas[24], i, j;
		for(i=0;i<24; i++) horas[i] = 0;
		char hora[2];

		//aux
		char buff[50], dia[11];
		int dias[7];
		for(i=0;i<7;i++) dias[i] = 0;

		return 0;
}
