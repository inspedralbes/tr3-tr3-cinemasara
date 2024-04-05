<template>
  <div class="patio-butacas">
    <div v-for="fila in 7" :key="fila" class="fila">
      <div v-for="(asiento, index) in butacas[fila - 1]" :key="`fila-${fila}-asiento-${index + 1}`" class="asiento"
        :class="{ vip: asiento.vip, ocupacioButaca: asiento.ocupacioButaca }" @click="toggleAsiento(asiento)">
        <img :src="getButacaImage(asiento)" :alt="'Asiento ' + (asiento.vip ? 'VIP' : 'Normal')" />
      </div>
    </div>
    <div class="container-pasarelaCompra" v-if="mostrarPasarela">
      <h2>Detalles de la Compra</h2>
      <p>Total: {{ total }}€</p>
      <button @click="comprarEntradas">Comprar</button>
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
            this.butacas[fila][columna].ocupacioButaca = true;
          }
        }
      })
    },
    comprarEntradas() {
      const asientosSelecionado = this.butacas.flatMap(fila => fila.filter(asiento => asiento.ocupacioButaca));

      if (asientosSelecionado.length <= 10 && asientosSelecionado.length > 0) {
        let entrada = [];

        for (let i = 0; i < asientosSelecionado.length; i++) {
          entrada.push({
            id_sesion: this.$route.params.id_pelicula,
            fila: asientosSelecionado[i].fila,
            columna: asientosSelecionado[i].columna,
            preu: asientosSelecionado[i].vip ? 8 : 6,
          });
        }
        return new Promise((resolve, reject) => {
          fetch('http://localhost:8000/api/entradas', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(entrada),
          }).then(response => {
            if (response.status == 201) {
              console.log('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
              return response.json();
            } else {
              reject('Error al comprar las entradas');
            }
          }).then(data => {
            JSON.stringify(data);
            resolve(data);
          }).catch(error => {
            console.error('Error:', error);
            reject(error);
          
          });
        });
      }else{
        alert('No puedes comprar mas de 10 entradas');
      }

    },
    actualizarSeleccionados() {
      this.seleccionados = [];
      this.butacas.forEach(fila => {
        fila.forEach(asiento => {
          if (asiento.ocupacioButaca) {
            this.seleccionados.push(asiento);
          }
        });
      });
      this.mostrarPasarela = this.seleccionados.length > 0;
    },
    toggleAsiento(asiento) {
      asiento.ocupacioButaca = !asiento.ocupacioButaca;
      this.actualizarSeleccionados();
    },
    getButacaImage(asiento) {
      if (asiento.vip) {
        return asiento.ocupacioButaca ? '/butacas/butaca-vip-ocupada.jpg' : '/butacas/butaca-vip-libre.jpg';
      } else {
        return asiento.ocupacioButaca ? '/butacas/butaca-normal-ocupada.jpg' : '/butacas/butaca-normal-libre.jpg';
      }
    },
  },
  computed: {
    total() {
      let total = 0;
      this.seleccionados.forEach(asiento => {
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
  flex-direction: column;
  align-items: center;
}

.fila {
  display: flex;
}

.asiento {
  margin: 5px;
}

.asiento img {
  width: 50px;
}
</style>