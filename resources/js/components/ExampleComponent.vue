<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 p-5">
        <div class="card">
          <form>
            <div class="mb-3">
              <label for="model.nombre" class="form-label">Nombre</label>
              <input
                type="text"
                class="form-control"
                id="model.nombre"
                v-model="model.nombre"
              />
            </div>
            <div class="mb-3">
              <label for="model.Apellido" class="form-label">Apellido</label>
              <input
                type="text"
                class="form-control"
                id="model.apellido"
                v-model="model.apellido"
              />
            </div>
            <div class="mb-3">
              <label for="model.cedula" class="form-label">Cedula</label>
              <input
                type="text"
                class="form-control"
                id="model.cedula"
                v-model="model.cedula"
              />
            </div>
            <div class="mb-3">
              <label for="model.Correo" class="form-label">Correo</label>
              <input
                type="text"
                class="form-control"
                id="model.Correo"
                v-model="model.correo"
              />
            </div>
            <div class="mb-3">
              <label for="model.Lenguajes" class="form-label">Lenguajes</label>
              <input
                type="text"
                class="form-control"
                id="model.Lenguajes"
                v-model="model.lenguajes"
              />
            </div>
            <button type="submit" class="btn btn-primary" @click.prevent="addProgramdor">
              Submit
            </button>
          </form>
        </div>
      </div>
      <div class="col-md-4 p-5">
        <pre>{{ mensaje }}</pre>
      </div>
      <div class="col-md-4 p-5">
        Programdores:<br />
        <pre>{{ data }}</pre>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      model: {
        nombre: "",
        apellido: "",
        cedula: "",
        correo: "",
        lenguajes: "",
        fecha_creacion: "",
      },
      mensaje: "",
      data: [],
    };
  },
  mounted() {
    console.log("Component mounted.");
    this.getProgramadores();
  },
  methods: {
    async addProgramdor() {
      try {
        let { data } = await axios.post("/api/add-programdor", this.model);
        this.mensaje = data;
        (this.model = {
          nombre: "",
          apellido: "",
          cedula: "",
          correo: "",
          lenguajes: "",
          fecha_creacion: "",
        }),
          this.getProgramadores();
      } catch (error) {
        this.mensaje = `Error del servidor --> ${error}`;
      }
    },
    async getProgramadores() {
      try {
        let { data } = await axios("/api/get-programadores");
        this.data = data;
      } catch (error) {
        this.mensaje = `Error del servidor --> ${error}`;
      }
    },
  },
};
</script>
