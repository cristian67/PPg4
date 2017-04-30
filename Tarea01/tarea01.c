#include <stdio.h>
#include <string.h>
#include <stdlib.h>

void asignarDia(char fecha[], int dias[]){
		char d[2],m[3],a[4];
		int dia, mes, anio;
		memcpy(d,&fecha[0],2);
		d[2] = '\0';	
		memcpy(m,&fecha[3],3);
		m[3] = '\0';	
		memcpy(a,&fecha[7],4);
		a[4] = '\0';
		
		//dia
		int aux = d[0] - '0';
		int aux2 = d[1] - '0';	
		dia = aux*10 + aux2;
		
		//mes
		if (strcmp(m,"Jan")==0) mes = 1;
		if (strcmp(m,"Feb")==0) mes = 2;
		if (strcmp(m,"Mar")==0) mes = 3;
		if (strcmp(m,"Apr")==0) mes = 4;
		if (strcmp(m,"May")==0) mes = 5;
		if (strcmp(m,"Jun")==0) mes = 6;
		if (strcmp(m,"Jul")==0) mes = 7;
		if (strcmp(m,"Aug")==0) mes = 8;
		if (strcmp(m,"sep")==0) mes = 9;
		if (strcmp(m,"Oct")==0) mes = 10;
		if (strcmp(m,"Nov")==0) mes = 11;
		if (strcmp(m,"Dec")==0) mes = 12;

		//anio
		int aux3 = a[0] - '0';
		int aux4 = a[1] - '0';
		int aux5 = a[2] - '0';
		int aux6 = a[3] - '0';
		anio = aux3*1000 + aux4*100 + aux5*10 + aux6;

		int diaSemana  = (dia += mes < 3 ? anio-- : anio - 2, 23*mes/9 + dia + 4 + anio/4 - anio/100 + anio/400)%7;

		// Cambio dia 7 x 0 debido a calendario ingles
		if ( diaSemana == 1) dias[0]++;		
		if ( diaSemana == 2) dias[1]++;		
		if ( diaSemana == 3) dias[2]++;		
		if ( diaSemana == 4) dias[3]++;		
		if ( diaSemana == 5) dias[4]++;		
		if ( diaSemana == 6) dias[5]++;		
		if ( diaSemana == 0) dias[6]++;		
}

void asignarHora(char hora[], int horas[]){
		if (strcmp(hora,"00")==0)	horas[0]++;
		if (strcmp(hora,"01")==0)	horas[1]++;
		if (strcmp(hora,"02")==0)	horas[2]++;
		if (strcmp(hora,"03")==0)	horas[3]++;
		if (strcmp(hora,"04")==0)	horas[4]++;
		if (strcmp(hora,"05")==0)	horas[5]++;
		if (strcmp(hora,"06")==0)	horas[6]++;
		if (strcmp(hora,"07")==0)	horas[7]++;
		if (strcmp(hora,"08")==0)	horas[8]++;
		if (strcmp(hora,"09")==0)	horas[9]++;
		if (strcmp(hora,"10")==0)	horas[10]++;
		if (strcmp(hora,"11")==0)	horas[11]++;
		if (strcmp(hora,"12")==0)	horas[12]++;
		if (strcmp(hora,"13")==0)	horas[13]++;
		if (strcmp(hora,"14")==0)	horas[14]++;
		if (strcmp(hora,"15")==0)	horas[15]++;
		if (strcmp(hora,"16")==0)	horas[16]++;
		if (strcmp(hora,"17")==0)	horas[17]++;
		if (strcmp(hora,"18")==0)	horas[18]++;
		if (strcmp(hora,"19")==0)	horas[19]++;
		if (strcmp(hora,"20")==0)	horas[20]++;
		if (strcmp(hora,"21")==0)	horas[21]++;
		if (strcmp(hora,"22")==0)	horas[22]++;
		if (strcmp(hora,"23")==0)	horas[23]++;
}

void escribirHoras(char archivo[], int horas[]){
		FILE *fp;
		int i;
		fp = fopen(archivo, "w+");
		fputs("Hora;Total\n",fp);
		for(i=0; i<24; i++){
				fprintf(fp, "%d;%d\n", i, horas[i]);
		}
		fclose(fp);
}


void escribirSemana(char archivo[], int dias[]){
		FILE *fp;
		int i;
		fp = fopen(archivo, "w+");
		fputs("Dia;Total\n",fp);
		fprintf(fp, "Lunes;%d\n", dias[0]);
		fprintf(fp, "Martes;%d\n", dias[1]);
		fprintf(fp, "Miercoles;%d\n", dias[2]);
		fprintf(fp, "Jueves;%d\n", dias[3]);
		fprintf(fp, "Viernes;%d\n", dias[4]);
		fprintf(fp, "Sabado;%d\n", dias[5]);
		fprintf(fp, "Domingo;%d\n", dias[6]);
		fclose(fp);
}

int main (int argc, char *argv[]){
	
		return 0;
}
