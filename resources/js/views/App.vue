<template>
  <div>
    <h1>
      Questo sta nel tag template e dentro al tag div obbligatorio din vue
    </h1>
    <br />
    <div>
      Questa poagina è nella cartella views/guest ma lo script che abbiamo messo
      li dentro rimanda alla cartella nelle resources chiamata js. dentro questa
      cartella abbiamo creato una cartella che si chiama sempre views e dentro
      abbiamo creato il file App.vue. Questi testi sono scritti dentro App.vue,
      ma il controller li va a recuperare dalla home salvata nella cartella
      guest sotto la cartella views nelle resources.
    </div>
    <br />
    <div>
      Bisogna ricordarsi di impostare nella pagina home.blade.php nella cartella
      guestil div con id root e sempre dentro il body lo script che manda con le
      doppie graffe alla cartella js/app.js
    </div>
    <br />
    <div>
      in app.js bisogna impostare la struttura di vue che richiama il div root
      nella pagina che vogliamo e importare il file App con questa linea "import
      App from './views/App';" con questa linea gli stiamo dicendo di recuperare
      il file App.vue
    </div>
    <br />
    <div>
      poi tutta la struttura di vue partendo in App.vue si fa come al solito con
      componenti methods import e export
    </div>
  </div>
</template>

<script>
export default {
  name: "App",
  components: {
    // qui andranno i component di questa view
  },
};
</script>

