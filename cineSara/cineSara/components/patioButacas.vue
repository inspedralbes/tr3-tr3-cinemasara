<template>
  <div class="patio-butacas">
    <div v-for="fila in 7" :key="fila" class="fila">
      <div v-for="(asiento, index) in butacas[fila - 1]" :key="`fila-${fila}-asiento-${index + 1}`" class="asiento"
        :class="{ vip: asiento.vip, ocupacio: asiento.ocupacio }" @click="toggleAsiento(asiento)">
        <img :src="getButacaImage(asiento)" :alt="'Asiento ' + (asiento.vip ? 'VIP' : 'Normal')" />
      </div>
    </div>
    <div class="container-pasarelaCompra" v-if="mostrarPasarela">
      <div class="container-compra">
        <h2>Detalles de la Compra</h2>
        <p>Total: {{ total }}€</p>
        <button @click="insertarCorreo" >Comprar</button>
      </div>
    </div>
  </div>

</template>

<script>

export default {
  data() {
    return {
      butacas: [],
      seleccionados: [],
      mostrarPasarela: false,
      ocupacioButaca: [],
      email: '',
    };
  },
  mounted() {
    this.inicializarButacas();
    this.actualizarOcupacionButaca();
  },
  methods: {
    inicializarButacas() {
      for (let fila = 1; fila <= 7; fila++) {
        let filaButacas = [];
        for (let asiento = 1; asiento <= 10; asiento++) {
          let vip = false;

          if (fila == 4) {
            vip = true;
          }
          filaButacas.push({
            vip: vip,
            ocupacioButaca: false,
            fila: fila,
            columna: asiento,
          });
        }
        this.butacas.push(filaButacas);
      }
    },
    async insertarCorreo(){
      const correo = prompt('Introduce tu correo electrónico');
      if(correo){
        this.email = correo;
        await this.comprarEntradas();
      }
    },
    async actualizarOcupacionButaca(){
      try{
        const response = await fetch('http://localhost:8000/api/entradas');
        const data = await response.json();
        this.actuazarButacas(data);
      }catch(error){
        console.error('Error:', error);
      }
    },

    async actuazarButacas(entradas){
      const idSesionActual = this.$route.params.id_pelicula;
      entradas.forEach(entrada => {
        if(entrada.id_sesion == idSesionActual){
          const fila = entrada.fila -1;
          const columna = entrada.columna -1;
          if(fila >= 0 && fila < this.butacas.length && columna >= 0 && columna < this.butacas[fila].length){
            this.butacas[fila][columna].ocupacio = true;
          }
        }
      })
    },
    comprarEntradas() {

    let asientosDisponibles = this.ocupacioButaca.filter(asiento => !asiento.ocupacioButaca);
      
  if (asientosDisponibles.length <= 10 && asientosDisponibles.length > 0) {
    let entrada = [];

    for (let i = 0; i < asientosDisponibles.length; i++) {
      entrada.push({
        id_sesion: this.$route.params.id_pelicula,
        fila: asientosDisponibles[i].fila,
        columna: asientosDisponibles[i].columna,
        preu: asientosDisponibles[i].vip ? 8 : 6,
        email: this.email,
      });
    }
    console.log('Comprando entradas');
    return new Promise((resolve, reject) => {
      fetch('http://localhost:8000/api/entradas', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(entrada),
        
      }).then(response => {
        if (response.status == 201) {
          console.log('Entradas compradas correctamente');
          return response.json();
          
        } else {
          reject('Error al comprar las entradas');
        }
      }).then(data => {
        resolve(data);
      }).catch(error => {
        console.error('Error:', error);
        reject(error);
      });
    });
    
  } else {
    alert('No puedes comprar más de 10 entradas o no hay asientos disponibles');
  }
},
    actualizarSeleccionados() {
      this.seleccionados = [];
      this.butacas.forEach(fila => {
        fila.forEach(asiento => {
          if (asiento.ocupacio) {
            this.seleccionados.push(asiento);
          }
        });
      });
      this.mostrarPasarela = this.seleccionados.length > 0;
    },
    toggleAsiento(asiento) {
      if(!asiento.ocupacio){
        asiento.ocupacio= !asiento.ocupacio;
        this.ocupacioButaca.push(asiento);
        this.actualizarSeleccionados();
      }else if(!this.ocupacioButaca.includes(asiento)) {
        alert('Este asiento ya esta ocupado. Por favor, selecciona otro.')
      }else {
        asiento.ocupacio = !asiento.ocupacio;
        const index = this.ocupacioButaca.indexOf(asiento);
        if(index > -1){
          this.ocupacioButaca.splice(index, 1);
        }
        this.actualizarSeleccionados();
      }
    },
    getButacaImage(asiento) {
      if (asiento.vip) {
        return asiento.ocupacio ? '/butacas/butaca-vip-ocupada.jpg' : '/butacas/butaca-vip-libre.jpg';
      } else {
        return asiento.ocupacio ? '/butacas/butaca-normal-ocupada.jpg' : '/butacas/butaca-normal-libre.jpg';
      }
    },
  },
  computed: {
  total() {
    let total = 0;
    
    this.ocupacioButaca.forEach(asiento => {
      total += asiento.vip ? 8 : 6;
    });
    
    return total;
  }
}
};
</script>

<style scoped>
.patio-butacas {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap; 
}

.fila {
  display: flex;
  justify-content: center; 
}

.asiento {
  margin: 5px;
}

.asiento img {
  width: 50px;
}

.container-compra {
  margin-top: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  background-color: rgb(144, 144, 233);
  width: 20vw;
  height: 20vh;
  border-radius: 10px;
}

@media only screen and (max-width: 600px) {
  .patio-butacas {
    flex-direction: column; 
    align-items: center; 
  }

  .asiento img {
    width: 23px; 
    
  }

  .container-compra {
    width: 99%; 
    max-width: 300px; 
    height: 35%;
  }
}


</style>