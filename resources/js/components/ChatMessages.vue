<template>

  <div class="alert alert-success" role="alert">
    {{ messages[messages.length - 1].message }}
  </div>

</template>

<script>
export default {
  props: ["messages"],
};
</script>