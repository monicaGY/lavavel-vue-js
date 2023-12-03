<template>
<div>

    <div>
        <label>nombre</label>
        <input name="nombre" v-model="producto.nombre" type="text"/>
    </div>
    <div>
        <label>precio</label>
        <input name="precio" v-model="producto.precio" type="number">
    </div>
    <div>
        <label>tipo</label>
        <input name="tipo" v-model="producto.tipo" type="text">
    </div>
    <div>
        <label>descripcion</label>
        <input name="descripcion" v-model="producto.descripcion" type="text">
    </div>
    <div>
        <label>color</label>
        <input name="color" v-model="producto.color" type="text">
    </div>
</div>
</template>

<script>
export default {
  props: ['producto']
  };
</script>
