<template>
  <div class="dev__page">
    <div class="dev__sidebar">
      <a 
        href="#dev-info"
      >Info</a>
    </div>
    <div class="dev__content">
      <section class="dev__section">
        <div class="dev__container">
          <h2 class="dev-title">Things to show on this page</h2>
          <p>This is for designers, developers and managers.</p>
          <p>
            Kleine uitleg over het project<br>
            Developers, managers<br>
            Datum - Start<br>
            Datum - Laatst bewerkt<br>
            Versie<br>
            Opzet (waar moet je op letten? Bijzonderheden? Bijv. een dark mode dmv. een parent class, dat soort meuk)<br>
            Dependencies (webpack, plugins?)<br>
            Sketch-bestand/Link<br>
            Zeppelin link<br>
            Wel/niet achter login?<br>
            Dit deel update-baar maken? Of bij elke nieuwe website een nieuwe versie meegeven?
          </p>
        </div>
      </section>
      <section 
        id="dev-info" 
        class="dev__section">
        <div class="dev__container">
          <h2 class="dev-title">What is the goal here?</h2>
          <p>Making much nicey nice.</p>
        </div>
      </section>
      <section 
        id="dev-info" 
        class="dev__section">
        <div class="dev__container">
          <h2 class="dev-title">Tell me, what you need?</h2>
          <p>Zero effort?</p>
          <p>A simple single file to set information?</p>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
export default {
  name: "DevPageInfo",
  components: {},
  props: {},
  data() {
    return {
      data: { type: Object, required: false }
    };
  }
};
</script>

<style lang="scss">
</style>
