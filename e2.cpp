#include <iostream>
#include <fstream>
using namespace std;

int main(){
    string nombre;
    ofstream archivo;
    int cantidad=0;
    ifstream archivo1;
    archivo.open("..E1.txt",ios::app);
    archivo1.open("..E1.txt",ios::in);

    if(archivo.is_open()&&archivo1.is_open()){
        while(nombre!="santiago"){
            cout<<"ingrese un mismo nombre las veces que quiera, ingrese santiago para salir"<<endl;
            cin>>nombre;
            if(nombre!="santiago"){    
                archivo<<nombre<<'.';
            }
        }
        string temp;
        while(getline(archivo1,temp,'.')){
            if (!temp.empty()) {
                cantidad++;  // Cada nombre se guarda seguido de un punto, y no debe ser vacío
            }
        }
        cout<<cantidad;
        archivo.close();
        archivo1.close();
        
    }
}