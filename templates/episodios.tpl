   <div class="contenidoTemporadasEpisodios" name="top">

     <table class="tablaTemporadas">
       <thead>
         <tr>
           <th class="fondoTh">Temporada N°</th>
           <th class="fondoTh">Episodio N°</th>
           <th class="fondoTh">Titulo</th>
         </tr>
       </thead>

       <tbody>
          {foreach from=$episodios item=episodio}
             </tr>
               <td class="fondoTd">{$episodio["id_season"]}</td>
               <td class="fondoTd"><a href="temporadaE/{$episodio["id_season"]}/episodio/{$episodio["id_episode"]}" target= "_self">{$episodio["id_episode"]}</a></td>
               <td class="fondoTd">{$episodio["episode_title"]}</td>
               <td class="fondoTd"><a href="editarE/{$episodio["id_season"]}/{$episodio["id_episode"]}" target= "_self">EDITAR</a></td>
             </tr>
          {/foreach}
       </tbody>
     </table>

    </div>
