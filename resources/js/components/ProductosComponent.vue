<template>
<div>
    <h1>{{ mensaje }}</h1>
    <div v-for="(producto, index) in productos[0]" :key="index">
        <input  type="checkbox"  :name="index" v-model="checked" :id="index" :value="index"/>
        <label :for="index">{{ index }}</label>
    </div>
    
    <table>
        <thead>
            <tr>
                <th v-for="(producto, index) in productos[0]" :key="index">
                    <div v-for="(check, j ) in checked" :key="j">
                        <div v-if="check == index">{{ index }}</div>
                    </div>
                </th>
                <th colspan="2">Accion</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="([key, value]) in Object.entries(productos)" :key="key">
                <td v-for="(producto, index) in productos[key]" :key="index">
                   {{ atributoProducto(index, producto)}}
                </td>
                <td>
                    <button  v-if="checked.length > 0" @click="eliminarProducto(value['id'])">Eliminar</button>
                </td>
                <td>
                    <form  v-if="checked.length > 0" method="get" :action="`/edit/${value['id']}`">
                        <button type="submit">Editar</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <form method="get" :action="`/producto`">
        <button type="submit">Crear</button>
    </form>
</div>
</template>
<script>
export default {
  data() {
    return {
        isChecked: false,
        mensaje: null,
        checked:[],
        productos: [],
        index:[],
        datos:0
    };
  },
  mounted() {
    
    this.obtenerProductos();
  },
  methods: {
    atributoProducto(atributo, producto){

        for (let i = 0; i < this.checked.length; i++){
            if(this.checked[i] == atributo)
                return producto;
        }
    },
    async eliminarProducto(id){
        const token = document.head.querySelector('meta[name="csrf-token"]').content;

        const response = await fetch(`/producto/${id}`, {
            method:'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token 
            }
        }); 
        if(response.ok){
            this.obtenerProductos();
            this.mensaje = 'Producto eliminado'
        }else{
            this.mensaje = 'No se ha podido borrar el producto'
        }
    },
    async obtenerProductos() {
        try {
            const response = await fetch('/productos'); 
            this.productos = await response.json();
            this.datos = Object.keys(this.productos[0]).length;
            this.mensaje = 'Mostrando productos'
        } catch (error) {
            this.mensaje = 'No se ha podido obtener los productos'
        }
    }
  }
};
</script>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}
table th {
  border: 1px solid #ddd;
}
table td {
  border: 1px solid #ddd;
}
</style>