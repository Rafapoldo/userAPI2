import { http } from "./config";

export default{
    listar:() => {
        return http.get('users');
    },

    salvar:(usuario) =>{
        return http.post('users', usuario);
    },

    atualizar:(usuario) => {
        return http.put('users/'+ usuario.id, usuario);
    },

    apagar:(usuario) => {
        return http.delete('users/'+ usuario.id);
    }


}