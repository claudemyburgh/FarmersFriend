<template>
  <div>

      <div class="form__group" :class="errors.title ? 'has__danger' : ''">
          <label for="title" class="form__label font--bold">Title</label>
          <div class="form__wrap">
              <input type="text" v-model="listing.title" id="title" class="form__item" @focus.prevent="errors.title = null" >
          </div>
          <div v-if="errors.title" class="form__helper">
              {{ errors.title[0] }}
          </div>
      </div>

      <categories-dropdown></categories-dropdown>
      <area-dropdown></area-dropdown>

      <slot>

      </slot>


  </div>
</template>

<script>
    import { mapGetters } from "vuex";
    import AreaDropdown from "./components/area/AreaDropdown";
    import CategoriesDropdown from "./components/categories/CategoriesDropdown";

    export default {
        name: "FormBase",
        components: {CategoriesDropdown, AreaDropdown},
        computed: {
            ...mapGetters({
                listing: 'listings/get_listing',
                errors: 'getValidationErrors',
                status: 'listings/get_processing_status'
            })
        }
    }
</script>

