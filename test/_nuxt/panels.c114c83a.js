import{u as d,c as p,G as t,ad as y}from"./entry.35cb4625.js";function g(){const i=d(),r=p(()=>{var n,a;return((a=(n=i.tairo)==null?void 0:n.panels)==null?void 0:a.map(e=>({...e,position:e.position??"left",overlay:e.overlay??!0})))??[]}),o=t("panels-current-name",()=>""),s=t("panels-transition-from",()=>"left"),u=t("panels-overlay",()=>!0),l=t("panels-current-props",()=>({})),c=p(()=>{if(o.value)return r.value.find(n=>n.name===o.value)});function v(n,a){const e=r.value.find(({name:m})=>m===n);e&&(s.value=e.position,o.value=e.name,u.value=e.overlay,l.value=y(a??{},e.props??{}))}function f(){o.value=""}return{panels:r,current:c,transitionFrom:s,currentProps:l,showOverlay:u,open:v,close:f}}export{g as u};