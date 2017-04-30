#include <stdio.h>
#include <string.h>
#define min(a,b) (((a)<(b)) ? (a):(b)) 


void imprimirHorario(char archivo[],int horario[][6]){
	int i, j;
  FILE *fp;
	fp = fopen(archivo,"w+");
	fprintf(fp, "Lunes;Martes;Miercoles;Jueves;Viernes;Sabado\n");
	for (i=0; i<8; i++){
		for (j=0;j<6;j++){
			//`if ((i==6 && j==5)||(i==7&&j==5))continue;
			if( horario[i][j] == 1) {
				fprintf(fp, "Algoritmos y Programacion");
			}
			if( horario[i][j] == 2) {
				fprintf(fp, "Estructura de Datos");
			}
			if( horario[i][j] == 3) {
				fprintf(fp, "Lenguaje de Programacion");
			}
			if( horario[i][j] == 4) {
				fprintf(fp, "Analisis de Algoritmos");
			}
			if( horario[i][j] == 5) {
				fprintf(fp, "Taller de Ciencias y Tecnologia");
			}
			if( horario[i][j] == 6) {
				fprintf(fp, "Tecnologia de Computadores");
			}
			if( horario[i][j] == 7) {
				fprintf(fp, "Redes y Comunicacion de Datos");
			}
			if( horario[i][j] == 8) {
				fprintf(fp, "Introduccion a la Ingenieria en Computacion");
			}
			if( horario[i][j] == 9) {
				fprintf(fp, "Base de Datos");
			}
			if( horario[i][j] == 10) {
				fprintf(fp, "Teoria de Sistemas");
			}
			if( horario[i][j] == 11) {
				fprintf(fp, "Grafos y Lenguajes Formales");
			}
			if( horario[i][j] == 12) {
				fprintf(fp, "Arquitectura de Computadores");
			}
			if( horario[i][j] == 13) {
				fprintf(fp, "Sistemas de Informacion");
			}
			if( horario[i][j] == 14) {
				fprintf(fp, "Ingenieria de Software");
			}
			if( horario[i][j] == 15) {
				fprintf(fp, "Sistemas Operativos");
			}
			if (j==5){
				fprintf(fp, "\n");	
			}else{
				fprintf(fp, ";");
			}
		}
	}
	fclose(fp);
}

void asignarHora(int codigo, int horario[][6], int dia){
	int i;
  for (i =0; i<8; i++){
		if ( dia == 5 && i > 5 ){
			break;
		}
		if ( horario[i][dia] == 0 ){
			horario[i][dia] = codigo;
			break;		
		}
	}
}

int main(){
	// Inicializacion
	int horarios[8][6];
	int i,j,k;
	int dias[6]={0,0,0,0,0,0};	
	int hProfes[5]={4,3,3,2,3};	
	int horas[6]={8,8,8,8,8,6};
	int index,x=0;
	int horario[8][6];
	int mProfe= 10;
	int rProfe[5][4][2];
  int minimo,minimoHora=10;
  int profes[5][6];
  int aux,aux1,aux2=10;

  for (i=0;i<5;i++) for(j=0;j<4;j++) rProfe[i][j][1]=3;	

	rProfe[0][1][0] = 1;
	rProfe[0][2][0] = 2;
	rProfe[0][3][0] = 3;
	rProfe[0][4][0] = 4;

	rProfe[1][1][0] = 5;
	rProfe[1][2][0] = 6;
	rProfe[1][3][0] = 7;

	rProfe[2][1][0] = 8;
	rProfe[2][2][0] = 9;
	rProfe[2][3][0] = 10;

	rProfe[3][1][0] = 11;
	rProfe[3][2][0] = 12;
	
	rProfe[4][1][0] = 13;
	rProfe[4][2][0] = 14;
	rProfe[4][3][0] = 15;

	for (i=0;i<8;i++) for(j=0;j<6;j++) horario[i][j]=0;

	// Llenado SH
	for (i = 0; i<6; i++) profes[0][i] = 1;
		
	// Llenado HP
	profes[1][0] = 1;
	profes[1][2] = 1;
	profes[1][4] = 1;

	// Lennado CAD
	profes[2][0] = 1;
	profes[2][1] = 1;
	profes[2][2] = 1;
	profes[3][1] = 1;
	profes[3][3] = 1;
	profes[3][5] = 1;

	for (i = 0; i<6; i++) profes[4][i] = 1;

	for ( i= 0; i<5; i++){
	 for(j=0; j<6; j++){
		if( profes[i][j] == 1) dias[j]++;
		}
  }

	while( hProfes[0] != 99 ){  
		// Busqueda de menor disponibilidad
		//printf("horas Profes;%d,%d,%d,%d,%d\n",hProfes[0],hProfes[1],hProfes[2],hProfes[3],hProfes[4]);
		
		if (hProfes[0] < minimoHora) {
			minimoHora = hProfes[0];
			index = 0;
		}
		if (hProfes[1] < minimoHora) {
			minimoHora = hProfes[1];
			index = 1;
		}
		if (hProfes[2] < minimoHora) {
			minimoHora = hProfes[2];
			index = 2;
		}
		if (hProfes[3] < minimoHora) {
			minimoHora = hProfes[3];
			index = 3;
		}
		if (hProfes[4] < minimoHora) {
			minimoHora = hProfes[4];
			index = 4;
		}
		// Condicionales con el horario disponible por dia
		for (i =0; i< 6; i++){
			if (profes[index][i] ==1 && horas[i]!=0){
				if ( aux2 > dias[i]){	
					aux2 = dias[i];
					aux = i;
				}	
			}				
		}
			
		//printf("%d,%d,%d,%d,%d,%d\n",dias[0],dias[1],dias[2],dias[3],dias[4],dias[5]);
		//printf("index%d,aux2%d,aux%d,horas%d\n",index,aux2,aux,horas[aux]);

		// Descontar del horario y horario profe
		if( horas[aux] - 3 < 0){
			if ( horas[aux] - 2 < 0){
			
				horas[aux] = horas[aux]-2;
				hProfes[index]--;
				for (i=0;i<4;i++){
						if (rProfe[index][i][0] > 0){
								asignarHora(rProfe[index][i][0],horario,aux);
								rProfe[index][i][0] =0;
								rProfe[index][i][1] -= 1;	
								break;
						}
				}	
			}else{
				horas[aux] = horas[aux]-2;
				hProfes[index]--;
				for (i=0;i<4;i++){
						if (rProfe[index][i][0] > 0){
								asignarHora(rProfe[index][i][0],horario,aux);
								asignarHora(rProfe[index][i][0],horario,aux);
								rProfe[index][i][0] =0;
								rProfe[index][i][1] -= 2;	
								break;
						}
				}
				if (rProfe[index][i][1] >0){
						for (i =0; i<6; i++){
								if (profes[index][i] == 1 && horas[i] >0){
									asignarHora(rProfe[index][i][0],horario,i);
									rProfe[index][i][1] -= 1;
								  break;
								}
						}								
				}	
			}
		}else{
			horas[aux] = horas[aux]- 3;	
			hProfes[index]--;
			for(i=0; i<4; i++){
				if ( rProfe[index][i][0] > 0 ){
					asignarHora(rProfe[index][i][0],horario,aux);
					asignarHora(rProfe[index][i][0],horario,aux);
					asignarHora(rProfe[index][i][0],horario,aux);
					rProfe[index][i][0] = 0;
					break;
				}
			}
		}
		for (i=0;i<5;i++){
			if (hProfes[i] == 0) hProfes[i] =99;
		}
		minimo = 10;
		aux2 = 10;
		minimoHora=10;
		/*for(i=0;i<8;i++) {
       for(j=0;j<6;j++) {
         printf("%d,",horario[i][j]);
       }
       printf("\n");
     }
	  */

		//f(r(i=0;i<6;i++) dias[i]=0;
		}	
    /*for(i=0;i<8;i++) {
			for(j=0;j<6;j++) { 
				printf("%d,",horario[i][j]);
			}
			printf("\n");
    }*/
		imprimirHorario((char*)"horario.csv",horario);
return 0;
}
