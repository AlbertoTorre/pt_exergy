<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrarme</div>

                    <div class="panel-body">
                        <form  method="POST" @submit.prevent="create" ref="create">
                            <div :class="{'col-md-6 form-group':true,'has-error':errors.has('name') }">
                              <label class="control-label" for="name">Usuario</label>
                              <input v-model="name" name="name" type="text" class="form-control" v-validate="'required'">
                              <div class="message-validate has-error" v-show="errors.has('name')"> {{ errors.first('name') }} </div>
                            </div>

                            <div :class="{'col-md-6 form-group':true,'has-error':errors.has('first_name') }">
                              <label class="control-label" for="first_name">Nombres</label>
                              <input v-model="first_name" name="first_name" type="text" class="form-control" v-validate="'required'">
                              <div class="message-validate has-error" v-show="errors.has('first_name')"> {{ errors.first('first_name') }} </div>
                            </div>

                            <div :class="{'col-md-6 form-group':true,'has-error':errors.has('last_name') }">
                              <label class="control-label" for="last_name">Apellidos</label>
                              <input v-model="last_name" name="last_name" type="text" class="form-control" v-validate="'required'">
                              <div class="message-validate has-error" v-show="errors.has('last_name')"> {{ errors.first('last_name') }} </div>
                            </div>

                            <div :class="{'col-md-6 form-group':true, 'has-error':errors.has('mobile') }">
                                <label class="control-label" for="mobile">Celular</label>
                                <input v-model="mobile" name="mobile" type="text" class="form-control" v-validate="'required|numeric'">
                                <div class="message-validate has-error" v-show="errors.has('mobile')"> {{ errors.first('mobile') }} </div>
                            </div>

                            <div :class="{'col-md-12 form-group':true,'has-error':errors.has('email') }">
                              <label class="control-label" for="email">Correo Electronico</label>
                              <input v-model="email" name="email" type="text" class="form-control" v-validate="'required|email'">
                              <div class="message-validate has-error" v-show="errors.has('email')"> {{ errors.first('email') }} </div>
                            </div>

                            <div :class="{'col-md-6 form-group':true,'has-error':errors.has('password') }">
                              <label class="control-label" for="password">Clave</label>
                              <input v-model="password" name="password" type="password" class="form-control" v-validate="'required'">
                              <div class="message-validate has-error" v-show="errors.has('password')"> {{ errors.first('password') }} </div>
                            </div>

                            <div :class="{'col-md-6 form-group':true,'has-error':errors.has('password_confirmation') }">
                                <label class="control-label" for="password_confirmation">Repetir Clave</label>
                                <input v-model="password_confirmation" name="password_confirmation" type="password" class="form-control" style="font-size:30px;" v-validate="{required:true,confirmed:'password'}">
                                <div class="message-validate has-error" v-show="errors.has('password_confirmation')"> {{ errors.first('password_confirmation') }} </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-2 col-md-offset-10">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:'Register',
        mounted() {
            console.log('Component mounted.')
        },
        data:()=>{
            return {
                name:'',
                first_name:'',
                last_name:'',
                mobile:'',
                email:'',
                password:'',
                password_confirmation:''
            }
        },
        methods:{
            create() {
                this.$validator.validateAll().then( (result) => {
                    if (result)
                    {
                        if(!this.inProcess)
                        {
                            this.$toasterE.info('Verificando información, espere unos segundos...', {mark:1})
                            this.inProcess = true
                            let formData = new FormData(this.$refs.create)
                            axios.post(baseURL+'/register/create', formData )
                            .then( (res) => {
                                if(res.data.submit)
                                {
                                    this.$toasterE.success(res.data.msn, {mark:1, timeout:1200})
                                    this.name=''
                                    this.first_name=''
                                    this.last_name=''
                                    this.mobile=''
                                    this.email=''
                                    this.password=''
                                    this.password_confirmation=''
                                    this.$validator.reset()
                                }else{
                                  this.$toasterE.error(res.data.msn, {mark:1})
                                }
                                this.inProcess = false
                            }).catch( (err) => {
                                this.$toasterE.error(err,{mark:1})
                                this.inProcess = false
                            })
                        }
                    }
                })
            }
        }
    }
</script>

<style scoped>
.message-validate{
    position: absolute;
    right: 0;
    color: #cc0000;
    font-size: 12px;
    margin-top: -3px;
    padding: 0;
    margin-right: 14px;
}
</style>