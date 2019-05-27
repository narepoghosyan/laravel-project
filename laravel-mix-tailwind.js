let mix = require('laravel-mix');

class Tailwind {
   dependencies(){
       this.requiresReload = 'asdf';
       return ['tailwindcss'];
   }

   register(){
       let tailwindcss = require('tailwindcss');

       Config.postCss.push(tailwindcss('./tailwind.js'))
   }

   boot(){

   }
}

mix.extend('tailwind', new Tailwind());