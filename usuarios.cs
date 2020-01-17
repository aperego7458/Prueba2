using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Prueba
{
    #region Usuarios
    public class Usuarios
    {
        #region Member Variables
        protected int _id;
        protected string _nombre;
        protected string _nickname;
        protected int _puntuacion;
        #endregion
        #region Constructors
        public Usuarios() { }
        public Usuarios(string nombre, string nickname, int puntuacion)
        {
            this._nombre=nombre;
            this._nickname=nickname;
            this._puntuacion=puntuacion;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Nombre
        {
            get {return _nombre;}
            set {_nombre=value;}
        }
        public virtual string Nickname
        {
            get {return _nickname;}
            set {_nickname=value;}
        }
        public virtual int Puntuacion
        {
            get {return _puntuacion;}
            set {_puntuacion=value;}
        }
        #endregion
    }
    #endregion
}