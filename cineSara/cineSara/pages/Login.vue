<template>
    <div class="container-login" >
        <h1>Inicia Sesio</h1>
        <form @submit.prevent="login">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" v-model="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contrasenya</label>
                <input type="password" id="password" v-model="password" required>
            </div>
            <button type="submit">Iniciar Sessio</button>
        </form>
    </div>
</template>

<style>
    .container-login {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px;
    }

    .container-login h1 {
        font-size: 20px;
        margin-bottom: 15px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .form-group button {
        padding: 10px;
        border-radius: 5px;
        border: none;
        background-color: #333;
        color: #fff;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #555;
    }
</style>
<script>
    export default {
        data(){
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            async login(){
                try{
                    const response = await fetch('/login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            email: this.email,
                            password: this.password
                        })
                    });
                    if(!response.ok){
                        throw new Error('Error en iniciar sessio');
                    }
                    console.log('Inici de sessio correcte');
                    this.$router.push('/Admin');
                    
            }catch(error){
                console.error('Error:', error);
            }
        }

    }
};


</script>