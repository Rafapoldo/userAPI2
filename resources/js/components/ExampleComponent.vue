<template>
  <div id="app">

    <nav>
      <div class="nav-wrapper blue darken-1">
        <a href="#" class="brand-logo center">Users API</a>
      </div>
    </nav>

    <div class="container">

        <ul>
            <li v-for="(erro, index) of errors" :key="index">
               Input: <b>{{index}}</b> - {{erro}}
            </li>
        </ul>

      <form @submit.prevent="save">
        <label>Name</label>
        <input type="text" placeholder="Name" v-model="usuario.name">
        
        <label>Email</label>
            <input type="email" placeholder="Email" v-model="usuario.email">
        
        <label>Password</label>
        <input type="password" placeholder="Password" v-model="usuario.password">
        
        <label>Number</label>
        <input type="number" placeholder="Number" v-model="usuario.number">
        <button class="waves-effect waves-light btn-small">Salvar<i class="material-icons left">save</i></button>
      </form>

      <table>

        <thead>

          <tr>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>NUMBER</th>
            <th>OPTIONS</th>
          </tr>

        </thead>

        <tbody>

          <tr v-for="u of users" :key="u.id">

            <td>{{ u.name }}</td>
            <td>{{ u.email }}</td>
            <td>{{ u.password }}</td>
            <td>{{ u.number }}</td>
            <td>
              <button @click="editar(u)"  class="waves-effect btn-small blue darken-1"><i class="material-icons">create</i></button>
              <button @click="remover(u)" class="waves-effect btn-small red darken-1"><i class="material-icons">delete_sweep</i></button>
            </td>

          </tr>

        </tbody>
      
      </table>

    </div>

  </div>
</template>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    
<script>
    import User from './services/users'; 


    export default {
        data: function(){
            return { 
                users: [],
                usuario: {
                    'id': '',
                    'name': '', 
                    'email': '',
                    'password': '',
                    'number': ''
                },
                errors:[]
            } 
        },
        mounted() {
           this.listar();
        },

        methods:{
            save(){
                if(!this.usuario.id){
                    User.salvar(this.usuario).then(r => {
                        this.usuario = {};
                        this.errors = [];
                        alert('Salvo com sucesso');
                        this.listar();
                    }).catch(e =>{
                        this.errors = e.response.data.errors;
                    })
                }else{
                     User.atualizar(this.usuario).then(r => {
                        this.usuario = {};
                        this.errors = [];
                        alert('Atualizado com sucesso');
                        this.listar();
                    }).catch(e =>{
                        this.errors = e.response.data.errors;
                    })
                }
               
            },
            listar(){
                User.listar().then(r => {
                    this.users = r.data
                })
            },
            editar(usuario){
                this.usuario = usuario;
            },
            remover(usuario){
                if(confirm('Deseja excluir esse usuario?')){
                    User.apagar(usuario).then(r => {
                        alert('Usuario deletado com sucesso');
                        this.listar();
                        this.errors = [];
                    }).catch(e =>{

                    })
                }
                
            }
        }
    }
</script>
