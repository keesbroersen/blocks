<template>
  <div class="dev__page">
    <DevSidebar>
      <a 
        href="#dev-info"
      >Info</a>
      <a 
        href="#dev-github"
      >Github</a>
    </DevSidebar>
    <div class="dev__content">
      <section class="dev__section">
        <div class="dev__container">
          <h2 class="dev-title">Projectname</h2>
          <p>This is for designers, developers and managers.</p>
          <p>
            Kleine uitleg over het project<br>
            Developers, managers<br>
            Datum - Start<br>
            Datum - Laatst bewerkt<br>
            Status: building / live / live met onderhoudscontract
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
        v-if="Object.keys(github).length !== 0" 
        id="dev-github" 
        class="dev__section">
        <div class="dev__container">
          <h2 class="dev-title">Github</h2>
          <p>
            Repo: <strong>{{ github.name }}</strong><br>
            Owner: <strong>{{ github.owner.login }}</strong><br><br>
            URL: <a 
              :href="github.html_url" 
              target="_blank"><strong>{{ github.html_url }}</strong></a><br>
            Description: <strong>{{ github.description }}</strong><br><br>
            Created: <strong>{{ github.created_at }}</strong><br>
            Updated: <strong>{{ github.updated_at }}</strong>
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
import axios from "axios";
import DevSidebar from "./DevSidebar.vue";

export default {
  name: "DevPageInfo",
  components: {
    DevSidebar
  },
  props: {},
  data() {
    return {
      data: { type: Object, required: false },
      github: { type: Object, required: false, default: {} }
    };
  },
  mounted() {
    axios
      .get("https://api.github.com/repos/keesbroersen/blocks")
      .then(response => (this.github = response.data));
  }
};
</script>

<style lang="scss">
#dev-github {
  background: url('data:image/svg+xml, <svg width="200px" viewBox="0 0 121 119" xmlns="http://www.w3.org/2000/svg"><g fill="%23eeeeee" fill-rule="evenodd"><path d="M60.609.445C27.262.445.221 27.481.221 60.833c0 26.681 17.303 49.317 41.297 57.302 3.018.559 4.126-1.31 4.126-2.905 0-1.44-.056-6.197-.082-11.243-16.8 3.653-20.345-7.125-20.345-7.125-2.747-6.98-6.705-8.836-6.705-8.836-5.479-3.748.413-3.671.413-3.671 6.064.426 9.257 6.223 9.257 6.223 5.386 9.232 14.127 6.563 17.573 5.02.542-3.903 2.107-6.567 3.834-8.075-13.413-1.527-27.513-6.705-27.513-29.844 0-6.593 2.359-11.98 6.222-16.209-.627-1.521-2.694-7.663.585-15.981 0 0 5.071-1.623 16.611 6.19 4.817-1.338 9.983-2.009 15.115-2.032 5.132.023 10.302.694 15.128 2.032 11.526-7.813 16.59-6.19 16.59-6.19 3.287 8.318 1.219 14.46.592 15.981 3.872 4.229 6.215 9.616 6.215 16.209 0 23.194-14.127 28.301-27.574 29.796 2.166 1.874 4.096 5.549 4.096 11.183 0 8.08-.07 14.583-.07 16.572 0 1.607 1.087 3.49 4.148 2.897 23.981-7.994 41.262-30.622 41.262-57.294 0-33.352-27.037-60.388-60.387-60.388"/><path d="M23.093 87.149c-.133.3-.605.39-1.035.184-.438-.197-.684-.606-.542-.907.13-.309.603-.395 1.04-.188.439.197.689.61.537.911M25.539 89.877c-.288.267-.851.143-1.233-.279-.395-.421-.469-.984-.177-1.255.297-.267.843-.142 1.239.279.395.426.472.985.171 1.255M27.92 93.355c-.37.257-.975.016-1.349-.521-.37-.537-.37-1.181.008-1.439.375-.258.971-.026 1.35.507.369.546.369 1.19-.009 1.453M31.182 96.715c-.331.365-1.036.267-1.552-.231-.528-.487-.675-1.178-.343-1.543.335-.366 1.044-.263 1.564.231.524.486.684 1.182.331 1.543M35.682 98.666c-.146.473-.825.688-1.509.487-.683-.207-1.13-.761-.992-1.239.142-.476.824-.7 1.513-.485.682.206 1.13.756.988 1.237M40.624 99.028c.017.498-.563.911-1.281.92-.722.016-1.306-.387-1.314-.877 0-.503.567-.912 1.289-.924.718-.014 1.306.386 1.306.881M45.223 98.245c.086.486-.413.985-1.126 1.118-.701.128-1.35-.172-1.439-.654-.087-.498.421-.997 1.121-1.126.714-.124 1.353.168 1.444.662"/></g></svg>');
  background-repeat: no-repeat;
  background-position: 95%;
  background-size: 150px;
}
</style>
