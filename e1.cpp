#include <iostream>
#include <fstream>
using namespace std;

int main(){
    ofstream archivo;
    string nombre;
    archivo.open("..E1.txt",ios::app);

    if(archivo.is_open()){
        for(int i=0;i<10;i++){
            cout<<"ingrese un nombre sin espacios"<<endl;
            cin>>nombre;
            archivo<<nombre;
        }
    }
    cout<<nombre<<endl;
    archivo.close();
}   