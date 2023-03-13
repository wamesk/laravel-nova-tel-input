<template>
  <PanelItem :index="index" :field="field" />
</template>

<script>
export default {
  props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
    mounted() {
        console.log( this.field.value);
        this.field.value = this.field.value.replace(/(\d{3})(\d{3})(\d{3})/, '$1 $2 $3 ');

    },
}
</script>
