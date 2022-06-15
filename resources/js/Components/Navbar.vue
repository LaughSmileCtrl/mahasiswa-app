<template>
  <!-- Navbar -->
  <nav
    class="hide md:relative top-0 left-0 w-full z-10 bg-pink-500 md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
  >
    <div
      class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
    >
      <!-- Brand -->
      <h2
        class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
        >{{ name }}</h2
      >
      
      <!-- User -->
      <ul
        class="flex-col md:flex-row list-none items-center hidden md:flex gap-6"
      >
        <button @click="$emit('changeTheme')"><i class="fas fa-adjust fa-lg text-white"></i></button>
        <user-dropdown-component></user-dropdown-component>
      </ul>
    </div>
  </nav>

  <!-- End Navbar -->
</template>
<script>
import UserDropdownComponent from "./UserDropdown.vue";
export default {
  components: {
    UserDropdownComponent
  },
  props: ['name'],
};
</script>
