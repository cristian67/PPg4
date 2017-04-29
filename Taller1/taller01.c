#include <stdio.h>
#include <string.h>
#define PERIODO 3 
#define min(a,b) (((a)<(b)) ? (a):(b)) 


void imprimirHorario(char archivo[],int horario[][6]){
	FILE *fp;
	fp = fopen(archivo,"w+");
	fprintf(fp, "Lunes;Martes;Miercoles;Jueves;Viernes;Sabado\n");
	for (int i=0; i<8; i++){
		for (int j=0;j<6;j++){
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
		//debugear esto
		//if( i == 5 && j = 6 ) break;

	}
	fclose(fp);
}

void asignarHora(int codigo, int horario[][6], int dia){
	for ( int i =0; i<8; i++){
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
	int index;
	int horario[8][6];
	int mProfe= 10;
	int rProfe[5][4];
	
	rProfe[0][1] = 1;
	rProfe[0][2] = 2;
	rProfe[0][3] = 3;
	rProfe[0][4] = 4;

	rProfe[1][1] = 5;
	rProfe[1][2] = 6;
	rProfe[1][3] = 7;

	rProfe[2][1] = 8;
	rProfe[2][2] = 9;
	rProfe[2][3] = 10;

	rProfe[3][1] = 11;
	rProfe[3][2] = 12;
	
	rProfe[4][1] = 13;
	rProfe[4][2] = 14;
	rProfe[4][3] = 15;

	for (i=0;i<8;i++) for(j=0;j<6;j++) horario[i][j]=0;

	// Disponibilidad

	int profes[5][6];
	
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


	profes[3][2] = 1;
	profes[3][4] = 1;
	profes[3][6] = 1;


	for (i = 0; i<6; i++) profes[4][i] = 1;


	while( hProfes[0] != 0 && hProfes[1] != 0 && hProfes[2] != 0 && hProfes[3] != 0 && hProfes[4] ){  
	// Busqueda de menor disponibilidad

	for ( i= 0; i<5; i++){
		for(j=0; j<6; j++){
			if( profes[i][j] == 0) dias[0]++;
			if( profes[i][j] == 1) dias[1]++;
			if( profes[i][j] == 2) dias[2]++;
			if( profes[i][j] == 3) dias[3]++;
			if( profes[i][j] == 4) dias[4]++;
			if( profes[i][j] == 5) dias[5]++;
		}

	}
	int minimo;
	minimo = (dias[0],dias[1]);
	minimo = (minimo,dias[2]);
	minimo = (minimo,dias[3]);
	minimo = (minimo,dias[4]);
	minimo = (minimo,dias[5]);

	int minimoHora=10;
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

	int aux, aux1, aux2=10;
	for (i =0; i< 6; i++){
		if (profes[index][i] ==1){
			if ( aux2 > dias[i])	
				aux2 = dias[i];
				aux = i;	
		} 		

	}
	
	// Descontar del horario y horario profe
	if( horas[aux] - 3 < 0){
	}else{
		horas[aux] = horas[aux]- 3;	
		hProfes[index]--;
		for(i=0; i<index; i++){
			if ( rProfe[index][i] > 0 ){
				asignarHora(rProfe[index][i],horario,aux);
				asignarHora(rProfe[index][i],horario,aux);
				asignarHora(rProfe[index][i],horario,aux);
				rProfe[index][i] = 0;
				break;
			}
		}
	}
	minimo = 10;
	aux2 = 10;
	}	
	imprimirHorario((char*)"horario.csv",horario);
return 0;
}
