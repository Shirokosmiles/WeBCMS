import{_ as tt}from"./BaseInput.vue.94efaae5.js";import{_ as nt}from"./DemoAppSearchResult.vue.2970a544.js";import{_ as lt}from"./BaseFocusLoop.vue.9ca43770.js";import{_ as at}from"./BaseText.vue.2cdb9ff8.js";import ot from"./WhitemaneLogo.10e7e730.js";import{m as he,H as G,S as ne,o as F,u as le,P as pe,N as X,T as rt,t as Pe,p as je,l as P,y as st,a as it,b as xe,C as ut,c as ee,d as dt,e as ct,f as ft}from"./use-outside-click.c4b58af6.js";import{n as pt,f as $e,a as Se,E as Ne,d as de}from"./use-event-listener.32782fbb.js";import{d as V,r as y,c as v,p as O,q as K,s as C,F as Le,v as W,x as ie,y as z,z as Y,T as vt,A as mt,B as ht,C as yt,D as ve,o as A,f as Ve,w as I,i as E,b as N,e as L,E as ge,a as j,h as me,G as bt,H as wt,I as gt,J as Et,K as _t,j as oe,t as xt,L as Oe}from"./entry.35cb4625.js";import{u as $t,a as St}from"./platform.750396d9.js";import{u as Lt}from"./asyncData.bab2210c.js";import{o as Tt}from"./index.69c0a557.js";import"./BasePlaceload.cc2bfcd4.js";import"./_plugin-vue_export-helper.c27b6911.js";import"./Icon.ac5bc306.js";import"./input-id.bcc87dc5.js";import"./nuxt-link.43670e21.js";import"./logo.e24fe052.js";/* empty css                   */function Ft(){return/iPhone/gi.test(window.navigator.platform)||/Mac/gi.test(window.navigator.platform)&&window.navigator.maxTouchPoints>0}function qe(e){typeof queueMicrotask=="function"?queueMicrotask(e):Promise.resolve().then(e).catch(n=>setTimeout(()=>{throw n}))}function kt(e){function n(){document.readyState!=="loading"&&(e(),document.removeEventListener("DOMContentLoaded",n))}typeof window<"u"&&typeof document<"u"&&(document.addEventListener("DOMContentLoaded",n),n())}function Ie(e){if(!e)return new Set;if(typeof e=="function")return new Set(e());let n=new Set;for(let t of e.value){let l=F(t);l instanceof HTMLElement&&n.add(l)}return n}var Ue=(e=>(e[e.None=1]="None",e[e.InitialFocus=2]="InitialFocus",e[e.TabLock=4]="TabLock",e[e.FocusLock=8]="FocusLock",e[e.RestoreFocus=16]="RestoreFocus",e[e.All=30]="All",e))(Ue||{});let re=Object.assign(V({name:"FocusTrap",props:{as:{type:[Object,String],default:"div"},initialFocus:{type:Object,default:null},features:{type:Number,default:30},containers:{type:[Object,Function],default:y(new Set)}},inheritAttrs:!1,setup(e,{attrs:n,slots:t,expose:l}){let a=y(null);l({el:a,$el:a});let o=v(()=>he(a)),r=y(!1);O(()=>r.value=!0),K(()=>r.value=!1),Pt({ownerDocument:o},v(()=>r.value&&!!(e.features&16)));let s=Ct({ownerDocument:o,container:a,initialFocus:v(()=>e.initialFocus)},v(()=>r.value&&!!(e.features&2)));Dt({ownerDocument:o,container:a,containers:e.containers,previousActiveElement:s},v(()=>r.value&&!!(e.features&8)));let i=pt();function u(d){let b=F(a);b&&(g=>g())(()=>{le(i.value,{[de.Forwards]:()=>{pe(b,X.First,{skipElements:[d.relatedTarget]})},[de.Backwards]:()=>{pe(b,X.Last,{skipElements:[d.relatedTarget]})}})})}let p=y(!1);function _(d){d.key==="Tab"&&(p.value=!0,requestAnimationFrame(()=>{p.value=!1}))}function c(d){if(!r.value)return;let b=Ie(e.containers);F(a)instanceof HTMLElement&&b.add(F(a));let g=d.relatedTarget;g instanceof HTMLElement&&g.dataset.headlessuiFocusGuard!=="true"&&(We(b,g)||(p.value?pe(F(a),le(i.value,{[de.Forwards]:()=>X.Next,[de.Backwards]:()=>X.Previous})|X.WrapAround,{relativeTo:d.target}):d.target instanceof HTMLElement&&ne(d.target)))}return()=>{let d={},b={ref:a,onKeydown:_,onFocusout:c},{features:g,initialFocus:x,containers:B,...T}=e;return C(Le,[!!(g&4)&&C($e,{as:"button",type:"button","data-headlessui-focus-guard":!0,onFocus:u,features:Se.Focusable}),G({ourProps:b,theirProps:{...n,...T},slot:d,attrs:n,slots:t,name:"FocusTrap"}),!!(g&4)&&C($e,{as:"button",type:"button","data-headlessui-focus-guard":!0,onFocus:u,features:Se.Focusable})])}}}),{features:Ue}),Z=[];kt(()=>{function e(n){n.target instanceof HTMLElement&&n.target!==document.body&&Z[0]!==n.target&&(Z.unshift(n.target),Z=Z.filter(t=>t!=null&&t.isConnected),Z.splice(10))}window.addEventListener("click",e,{capture:!0}),window.addEventListener("mousedown",e,{capture:!0}),window.addEventListener("focus",e,{capture:!0}),document.body.addEventListener("click",e,{capture:!0}),document.body.addEventListener("mousedown",e,{capture:!0}),document.body.addEventListener("focus",e,{capture:!0})});function At(e){let n=y(Z.slice());return ie([e],([t],[l])=>{l===!0&&t===!1?qe(()=>{n.value.splice(0)}):l===!1&&t===!0&&(n.value=Z.slice())},{flush:"post"}),()=>{var t;return(t=n.value.find(l=>l!=null&&l.isConnected))!=null?t:null}}function Pt({ownerDocument:e},n){let t=At(n);O(()=>{W(()=>{var l,a;n.value||((l=e.value)==null?void 0:l.activeElement)===((a=e.value)==null?void 0:a.body)&&ne(t())},{flush:"post"})}),K(()=>{ne(t())})}function Ct({ownerDocument:e,container:n,initialFocus:t},l){let a=y(null),o=y(!1);return O(()=>o.value=!0),K(()=>o.value=!1),O(()=>{ie([n,t,l],(r,s)=>{if(r.every((u,p)=>(s==null?void 0:s[p])===u)||!l.value)return;let i=F(n);i&&qe(()=>{var u,p;if(!o.value)return;let _=F(t),c=(u=e.value)==null?void 0:u.activeElement;if(_){if(_===c){a.value=c;return}}else if(i.contains(c)){a.value=c;return}_?ne(_):pe(i,X.First|X.NoScroll)===rt.Error&&console.warn("There are no focusable elements inside the <FocusTrap />"),a.value=(p=e.value)==null?void 0:p.activeElement})},{immediate:!0,flush:"post"})}),a}function Dt({ownerDocument:e,container:n,containers:t,previousActiveElement:l},a){var o;Ne((o=e.value)==null?void 0:o.defaultView,"focus",r=>{if(!a.value)return;let s=Ie(t);F(n)instanceof HTMLElement&&s.add(F(n));let i=l.value;if(!i)return;let u=r.target;u&&u instanceof HTMLElement?We(s,u)?(l.value=u,ne(u)):(r.preventDefault(),r.stopPropagation(),ne(i)):ne(l.value)},!0)}function We(e,n){for(let t of e)if(t.contains(n))return!0;return!1}let Ee=new Map,se=new Map;function Be(e,n=y(!0)){W(t=>{var l;if(!n.value)return;let a=F(e);if(!a)return;t(function(){var r;if(!a)return;let s=(r=se.get(a))!=null?r:1;if(s===1?se.delete(a):se.set(a,s-1),s!==1)return;let i=Ee.get(a);i&&(i["aria-hidden"]===null?a.removeAttribute("aria-hidden"):a.setAttribute("aria-hidden",i["aria-hidden"]),a.inert=i.inert,Ee.delete(a))});let o=(l=se.get(a))!=null?l:0;se.set(a,o+1),o===0&&(Ee.set(a,{"aria-hidden":a.getAttribute("aria-hidden"),inert:a.inert}),a.setAttribute("aria-hidden","true"),a.inert=!0)})}let ze=Symbol("ForcePortalRootContext");function Rt(){return Y(ze,!1)}let Me=V({name:"ForcePortalRoot",props:{as:{type:[Object,String],default:"template"},force:{type:Boolean,default:!1}},setup(e,{slots:n,attrs:t}){return z(ze,e.force),()=>{let{force:l,...a}=e;return G({theirProps:a,ourProps:{},slot:{},slots:n,attrs:t,name:"ForcePortalRoot"})}}});function Ot(e){let n=he(e);if(!n){if(e===null)return null;throw new Error(`[Headless UI]: Cannot find ownerDocument for contextElement: ${e}`)}let t=n.getElementById("headlessui-portal-root");if(t)return t;let l=n.createElement("div");return l.setAttribute("id","headlessui-portal-root"),n.body.appendChild(l)}let Bt=V({name:"Portal",props:{as:{type:[Object,String],default:"div"}},setup(e,{slots:n,attrs:t}){let l=y(null),a=v(()=>he(l)),o=Rt(),r=Y(Ge,null),s=y(o===!0||r==null?Ot(l.value):r.resolveTarget());return W(()=>{o||r!=null&&(s.value=r.resolveTarget())}),K(()=>{var i,u;let p=(i=a.value)==null?void 0:i.getElementById("headlessui-portal-root");p&&s.value===p&&s.value.children.length<=0&&((u=s.value.parentElement)==null||u.removeChild(s.value))}),()=>{if(s.value===null)return null;let i={ref:l,"data-headlessui-portal":""};return C(vt,{to:s.value},G({ourProps:i,theirProps:e,slot:{},attrs:t,slots:n,name:"Portal"}))}}}),Ge=Symbol("PortalGroupContext"),Mt=V({name:"PortalGroup",props:{as:{type:[Object,String],default:"template"},target:{type:Object,default:null}},setup(e,{attrs:n,slots:t}){let l=mt({resolveTarget(){return e.target}});return z(Ge,l),()=>{let{target:a,...o}=e;return G({theirProps:o,ourProps:{},slot:{},attrs:n,slots:t,name:"PortalGroup"})}}}),Ke=Symbol("StackContext");var Te=(e=>(e[e.Add=0]="Add",e[e.Remove=1]="Remove",e))(Te||{});function Ht(){return Y(Ke,()=>{})}function jt({type:e,enabled:n,element:t,onUpdate:l}){let a=Ht();function o(...r){l==null||l(...r),a(...r)}O(()=>{ie(n,(r,s)=>{r?o(0,e,t):s===!0&&o(1,e,t)},{immediate:!0,flush:"sync"})}),K(()=>{n.value&&o(1,e,t)}),z(Ke,o)}let Nt=Symbol("DescriptionContext");function Vt({slot:e=y({}),name:n="Description",props:t={}}={}){let l=y([]);function a(o){return l.value.push(o),()=>{let r=l.value.indexOf(o);r!==-1&&l.value.splice(r,1)}}return z(Nt,{register:a,slot:e,name:n,props:t}),v(()=>l.value.length>0?l.value.join(" "):void 0)}function qt(e){let n=ht(e.getSnapshot());return K(e.subscribe(()=>{n.value=e.getSnapshot()})),n}function ye(){let e=[],n={addEventListener(t,l,a,o){return t.addEventListener(l,a,o),n.add(()=>t.removeEventListener(l,a,o))},requestAnimationFrame(...t){let l=requestAnimationFrame(...t);n.add(()=>cancelAnimationFrame(l))},nextFrame(...t){n.requestAnimationFrame(()=>{n.requestAnimationFrame(...t)})},setTimeout(...t){let l=setTimeout(...t);n.add(()=>clearTimeout(l))},style(t,l,a){let o=t.style.getPropertyValue(l);return Object.assign(t.style,{[l]:a}),this.add(()=>{Object.assign(t.style,{[l]:o})})},group(t){let l=ye();return t(l),this.add(()=>l.dispose())},add(t){return e.push(t),()=>{let l=e.indexOf(t);if(l>=0)for(let a of e.splice(l,1))a()}},dispose(){for(let t of e.splice(0))t()}};return n}function It(e,n){let t=e(),l=new Set;return{getSnapshot(){return t},subscribe(a){return l.add(a),()=>l.delete(a)},dispatch(a,...o){let r=n[a].call(t,...o);r&&(t=r,l.forEach(s=>s()))}}}function Ut(){let e;return{before({doc:n}){var t;let l=n.documentElement;e=((t=n.defaultView)!=null?t:window).innerWidth-l.clientWidth},after({doc:n,d:t}){let l=n.documentElement,a=l.clientWidth-l.offsetWidth,o=e-a;t.style(l,"paddingRight",`${o}px`)}}}function Wt(){if(!Ft())return{};let e;return{before(){e=window.pageYOffset},after({doc:n,d:t,meta:l}){function a(r){return l.containers.flatMap(s=>s()).some(s=>s.contains(r))}t.style(n.body,"marginTop",`-${e}px`),window.scrollTo(0,0);let o=null;t.addEventListener(n,"click",r=>{if(r.target instanceof HTMLElement)try{let s=r.target.closest("a");if(!s)return;let{hash:i}=new URL(s.href),u=n.querySelector(i);u&&!a(u)&&(o=u)}catch{}},!0),t.addEventListener(n,"touchmove",r=>{r.target instanceof HTMLElement&&!a(r.target)&&r.preventDefault()},{passive:!1}),t.add(()=>{window.scrollTo(0,window.pageYOffset+e),o&&o.isConnected&&(o.scrollIntoView({block:"nearest"}),o=null)})}}}function zt(){return{before({doc:e,d:n}){n.style(e.documentElement,"overflow","hidden")}}}function Gt(e){let n={};for(let t of e)Object.assign(n,t(n));return n}let te=It(()=>new Map,{PUSH(e,n){var t;let l=(t=this.get(e))!=null?t:{doc:e,count:0,d:ye(),meta:new Set};return l.count++,l.meta.add(n),this.set(e,l),this},POP(e,n){let t=this.get(e);return t&&(t.count--,t.meta.delete(n)),this},SCROLL_PREVENT({doc:e,d:n,meta:t}){let l={doc:e,d:n,meta:Gt(t)},a=[Wt(),Ut(),zt()];a.forEach(({before:o})=>o==null?void 0:o(l)),a.forEach(({after:o})=>o==null?void 0:o(l))},SCROLL_ALLOW({d:e}){e.dispose()},TEARDOWN({doc:e}){this.delete(e)}});te.subscribe(()=>{let e=te.getSnapshot(),n=new Map;for(let[t]of e)n.set(t,t.documentElement.style.overflow);for(let t of e.values()){let l=n.get(t.doc)==="hidden",a=t.count!==0;(a&&!l||!a&&l)&&te.dispatch(t.count>0?"SCROLL_PREVENT":"SCROLL_ALLOW",t),t.count===0&&te.dispatch("TEARDOWN",t)}});function Kt(e,n,t){let l=qt(te),a=v(()=>{let o=e.value?l.value.get(e.value):void 0;return o?o.count>0:!1});return ie([e,n],([o,r],[s],i)=>{if(!o||!r)return;te.dispatch("PUSH",o,t);let u=!1;i(()=>{u||(te.dispatch("POP",s??o,t),u=!0)})},{immediate:!0}),a}var Yt=(e=>(e[e.Open=0]="Open",e[e.Closed=1]="Closed",e))(Yt||{});let Fe=Symbol("DialogContext");function Ye(e){let n=Y(Fe,null);if(n===null){let t=new Error(`<${e} /> is missing a parent <Dialog /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(t,Ye),t}return n}let ce="DC8F892D-2EBD-447C-A4C8-A03058436FF4",Jt=V({name:"Dialog",inheritAttrs:!1,props:{as:{type:[Object,String],default:"div"},static:{type:Boolean,default:!1},unmount:{type:Boolean,default:!0},open:{type:[Boolean,String],default:ce},initialFocus:{type:Object,default:null},id:{type:String,default:()=>`headlessui-dialog-${Pe()}`}},emits:{close:e=>!0},setup(e,{emit:n,attrs:t,slots:l,expose:a}){var o;let r=y(!1);O(()=>{r.value=!0});let s=y(0),i=je(),u=v(()=>e.open===ce&&i!==null?(i.value&P.Open)===P.Open:e.open),p=y(null),_=y(null),c=v(()=>he(p));if(a({el:p,$el:p}),!(e.open!==ce||i!==null))throw new Error("You forgot to provide an `open` prop to the `Dialog`.");if(typeof u.value!="boolean")throw new Error(`You provided an \`open\` prop to the \`Dialog\`, but the value is not a boolean. Received: ${u.value===ce?void 0:e.open}`);let d=v(()=>r.value&&u.value?0:1),b=v(()=>d.value===0),g=v(()=>s.value>1),x=Y(Fe,null)!==null,B=v(()=>g.value?"parent":"leaf"),T=v(()=>i!==null?(i.value&P.Closing)===P.Closing:!1),D=v(()=>x||T.value?!1:b.value),q=v(()=>{var m,h,$;return($=Array.from((h=(m=c.value)==null?void 0:m.querySelectorAll("body > *"))!=null?h:[]).find(S=>S.id==="headlessui-portal-root"?!1:S.contains(F(_))&&S instanceof HTMLElement))!=null?$:null});Be(q,D);let R=v(()=>g.value?!0:b.value),M=v(()=>{var m,h,$;return($=Array.from((h=(m=c.value)==null?void 0:m.querySelectorAll("[data-headlessui-portal]"))!=null?h:[]).find(S=>S.contains(F(_))&&S instanceof HTMLElement))!=null?$:null});Be(M,R),jt({type:"Dialog",enabled:v(()=>d.value===0),element:p,onUpdate:(m,h)=>{if(h==="Dialog")return le(m,{[Te.Add]:()=>s.value+=1,[Te.Remove]:()=>s.value-=1})}});let f=Vt({name:"DialogDescription",slot:v(()=>({open:u.value}))}),w=y(null),k={titleId:w,panelRef:y(null),dialogState:d,setTitleId(m){w.value!==m&&(w.value=m)},close(){n("close",!1)}};z(Fe,k);function U(){var m,h,$;return[...Array.from((h=(m=c.value)==null?void 0:m.querySelectorAll("html > *, body > *, [data-headlessui-portal]"))!=null?h:[]).filter(S=>!(S===document.body||S===document.head||!(S instanceof HTMLElement)||S.contains(F(_))||k.panelRef.value&&S.contains(k.panelRef.value))),($=k.panelRef.value)!=null?$:p.value]}let ae=v(()=>!(!b.value||g.value));st(()=>U(),(m,h)=>{k.close(),yt(()=>h==null?void 0:h.focus())},ae);let we=v(()=>!(g.value||d.value!==0));Ne((o=c.value)==null?void 0:o.defaultView,"keydown",m=>{we.value&&(m.defaultPrevented||m.key===it.Escape&&(m.preventDefault(),m.stopPropagation(),k.close()))});let H=v(()=>!(T.value||d.value!==0||x));return Kt(c,H,m=>{var h;return{containers:[...(h=m.containers)!=null?h:[],U]}}),W(m=>{if(d.value!==0)return;let h=F(p);if(!h)return;let $=new ResizeObserver(S=>{for(let ue of S){let J=ue.target.getBoundingClientRect();J.x===0&&J.y===0&&J.width===0&&J.height===0&&k.close()}});$.observe(h),m(()=>$.disconnect())}),()=>{let{id:m,open:h,initialFocus:$,...S}=e,ue={...t,ref:p,id:m,role:"dialog","aria-modal":d.value===0?!0:void 0,"aria-labelledby":w.value,"aria-describedby":f.value},J={open:d.value===0};return C(Me,{force:!0},()=>[C(Bt,()=>C(Mt,{target:p.value},()=>C(Me,{force:!1},()=>C(re,{initialFocus:$,containers:U,features:b.value?le(B.value,{parent:re.features.RestoreFocus,leaf:re.features.All&~re.features.FocusLock}):re.features.None},()=>G({ourProps:ue,theirProps:S,slot:J,attrs:t,slots:l,visible:d.value===0,features:xe.RenderStrategy|xe.Static,name:"Dialog"}))))),C($e,{features:Se.Hidden,ref:_})])}}}),Qt=V({name:"DialogPanel",props:{as:{type:[Object,String],default:"div"},id:{type:String,default:()=>`headlessui-dialog-panel-${Pe()}`}},setup(e,{attrs:n,slots:t,expose:l}){let a=Ye("DialogPanel");l({el:a.panelRef,$el:a.panelRef});function o(r){r.stopPropagation()}return()=>{let{id:r,...s}=e,i={id:r,ref:a.panelRef,onClick:o};return G({ourProps:i,theirProps:s,slot:{open:a.dialogState.value===0},attrs:n,slots:t,name:"DialogPanel"})}}});function Xt(e){let n={called:!1};return(...t)=>{if(!n.called)return n.called=!0,e(...t)}}function _e(e,...n){e&&n.length>0&&e.classList.add(...n)}function fe(e,...n){e&&n.length>0&&e.classList.remove(...n)}var ke=(e=>(e.Finished="finished",e.Cancelled="cancelled",e))(ke||{});function Zt(e,n){let t=ye();if(!e)return t.dispose;let{transitionDuration:l,transitionDelay:a}=getComputedStyle(e),[o,r]=[l,a].map(s=>{let[i=0]=s.split(",").filter(Boolean).map(u=>u.includes("ms")?parseFloat(u):parseFloat(u)*1e3).sort((u,p)=>p-u);return i});return o!==0?t.setTimeout(()=>n("finished"),o+r):n("finished"),t.add(()=>n("cancelled")),t.dispose}function He(e,n,t,l,a,o){let r=ye(),s=o!==void 0?Xt(o):()=>{};return fe(e,...a),_e(e,...n,...t),r.nextFrame(()=>{fe(e,...t),_e(e,...l),r.add(Zt(e,i=>(fe(e,...l,...n),_e(e,...a),s(i))))}),r.add(()=>fe(e,...n,...t,...l,...a)),r.add(()=>s("cancelled")),r.dispose}function Q(e=""){return e.split(" ").filter(n=>n.trim().length>1)}let Ce=Symbol("TransitionContext");var en=(e=>(e.Visible="visible",e.Hidden="hidden",e))(en||{});function tn(){return Y(Ce,null)!==null}function nn(){let e=Y(Ce,null);if(e===null)throw new Error("A <TransitionChild /> is used but it is missing a parent <TransitionRoot />.");return e}function ln(){let e=Y(De,null);if(e===null)throw new Error("A <TransitionChild /> is used but it is missing a parent <TransitionRoot />.");return e}let De=Symbol("NestingContext");function be(e){return"children"in e?be(e.children):e.value.filter(({state:n})=>n==="visible").length>0}function Je(e){let n=y([]),t=y(!1);O(()=>t.value=!0),K(()=>t.value=!1);function l(o,r=ee.Hidden){let s=n.value.findIndex(({id:i})=>i===o);s!==-1&&(le(r,{[ee.Unmount](){n.value.splice(s,1)},[ee.Hidden](){n.value[s].state="hidden"}}),!be(n)&&t.value&&(e==null||e()))}function a(o){let r=n.value.find(({id:s})=>s===o);return r?r.state!=="visible"&&(r.state="visible"):n.value.push({id:o,state:"visible"}),()=>l(o,ee.Unmount)}return{children:n,register:a,unregister:l}}let Qe=xe.RenderStrategy,Ae=V({props:{as:{type:[Object,String],default:"div"},show:{type:[Boolean],default:null},unmount:{type:[Boolean],default:!0},appear:{type:[Boolean],default:!1},enter:{type:[String],default:""},enterFrom:{type:[String],default:""},enterTo:{type:[String],default:""},entered:{type:[String],default:""},leave:{type:[String],default:""},leaveFrom:{type:[String],default:""},leaveTo:{type:[String],default:""}},emits:{beforeEnter:()=>!0,afterEnter:()=>!0,beforeLeave:()=>!0,afterLeave:()=>!0},setup(e,{emit:n,attrs:t,slots:l,expose:a}){let o=y(0);function r(){o.value|=P.Opening,n("beforeEnter")}function s(){o.value&=~P.Opening,n("afterEnter")}function i(){o.value|=P.Closing,n("beforeLeave")}function u(){o.value&=~P.Closing,n("afterLeave")}if(!tn()&&ut())return()=>C(Xe,{...e,onBeforeEnter:r,onAfterEnter:s,onBeforeLeave:i,onAfterLeave:u},l);let p=y(null),_=v(()=>e.unmount?ee.Unmount:ee.Hidden);a({el:p,$el:p});let{show:c,appear:d}=nn(),{register:b,unregister:g}=ln(),x=y(c.value?"visible":"hidden"),B={value:!0},T=Pe(),D={value:!1},q=Je(()=>{!D.value&&x.value!=="hidden"&&(x.value="hidden",g(T),u())});O(()=>{let H=b(T);K(H)}),W(()=>{if(_.value===ee.Hidden&&T){if(c.value&&x.value!=="visible"){x.value="visible";return}le(x.value,{hidden:()=>g(T),visible:()=>b(T)})}});let R=Q(e.enter),M=Q(e.enterFrom),f=Q(e.enterTo),w=Q(e.entered),k=Q(e.leave),U=Q(e.leaveFrom),ae=Q(e.leaveTo);O(()=>{W(()=>{if(x.value==="visible"){let H=F(p);if(H instanceof Comment&&H.data==="")throw new Error("Did you forget to passthrough the `ref` to the actual DOM node?")}})});function we(H){let m=B.value&&!d.value,h=F(p);!h||!(h instanceof HTMLElement)||m||(D.value=!0,c.value&&r(),c.value||i(),H(c.value?He(h,R,M,f,w,$=>{D.value=!1,$===ke.Finished&&s()}):He(h,k,U,ae,w,$=>{D.value=!1,$===ke.Finished&&(be(q)||(x.value="hidden",g(T),u()))})))}return O(()=>{ie([c],(H,m,h)=>{we(h),B.value=!1},{immediate:!0})}),z(De,q),dt(v(()=>le(x.value,{visible:P.Open,hidden:P.Closed})|o.value)),()=>{let{appear:H,show:m,enter:h,enterFrom:$,enterTo:S,entered:ue,leave:J,leaveFrom:Sn,leaveTo:Ln,...Re}=e,Ze={ref:p},et={...Re,...d.value&&c.value&&ct.isServer?{class:ve([t.class,Re.class,...R,...M])}:{}};return G({theirProps:et,ourProps:Ze,slot:{},slots:l,attrs:t,features:Qe,visible:x.value==="visible",name:"TransitionChild"})}}}),an=Ae,Xe=V({inheritAttrs:!1,props:{as:{type:[Object,String],default:"div"},show:{type:[Boolean],default:null},unmount:{type:[Boolean],default:!0},appear:{type:[Boolean],default:!1},enter:{type:[String],default:""},enterFrom:{type:[String],default:""},enterTo:{type:[String],default:""},entered:{type:[String],default:""},leave:{type:[String],default:""},leaveFrom:{type:[String],default:""},leaveTo:{type:[String],default:""}},emits:{beforeEnter:()=>!0,afterEnter:()=>!0,beforeLeave:()=>!0,afterLeave:()=>!0},setup(e,{emit:n,attrs:t,slots:l}){let a=je(),o=v(()=>e.show===null&&a!==null?(a.value&P.Open)===P.Open:e.show);W(()=>{if(![!0,!1].includes(o.value))throw new Error('A <Transition /> is used but it is missing a `:show="true | false"` prop.')});let r=y(o.value?"visible":"hidden"),s=Je(()=>{r.value="hidden"}),i=y(!0),u={show:o,appear:v(()=>e.appear||!i.value)};return O(()=>{W(()=>{i.value=!1,o.value?r.value="visible":be(s)||(r.value="hidden")})}),z(De,s),z(Ce,u),()=>{let p=ft(e,["show","appear","unmount","onBeforeEnter","onBeforeLeave","onAfterEnter","onAfterLeave"]),_={unmount:e.unmount};return G({ourProps:{..._,as:"template"},theirProps:{},slot:{},slots:{...l,default:()=>[C(an,{onBeforeEnter:()=>n("beforeEnter"),onAfterEnter:()=>n("afterEnter"),onBeforeLeave:()=>n("beforeLeave"),onAfterLeave:()=>n("afterLeave"),...t,..._,...p},l.default)]},attrs:{},features:Qe,visible:r.value==="visible",name:"Transition"})}}});const on={class:"fixed inset-0 z-[9999] flex items-center justify-center"},rn=E("div",{class:"bg-muted-800/70 dark:bg-muted-900/80 fixed inset-0"},null,-1),sn={class:"fixed inset-0"},un={inheritAttrs:!1},dn=V({...un,__name:"TairoModal",props:{open:{type:Boolean},size:{default:"md"},shape:{default:"rounded"},footerAlign:{default:"end"},classes:{default:()=>({wrapper:"",dialog:""})}},emits:["close"],setup(e,{emit:n}){const t=e,l=v(()=>{const a=[];switch(t.classes.dialog&&(Array.isArray(t.classes.dialog)?a.push(...t.classes.dialog):a.push(t.classes.dialog)),t.shape){case"rounded":a.push("rounded-lg");break;case"curved":a.push("rounded-xl");break}switch(t.size){case"sm":a.push("max-w-sm");break;case"md":a.push("max-w-md");break;case"lg":a.push("max-w-xl");break;case"xl":a.push("max-w-2xl");break;case"2xl":a.push("max-w-3xl");break;case"3xl":a.push("max-w-5xl");break}return a});return(a,o)=>(A(),Ve(L(Xe),{appear:"",show:t.open,as:"template"},{default:I(()=>[E("div",on,[N(L(Jt),{class:"relative z-[9999]",as:"div",onClose:o[0]||(o[0]=r=>n("close"))},{default:I(()=>[N(L(Ae),{as:"template",enter:"duration-300 ease-out","enter-from":"opacity-0","enter-to":"opacity-100",leave:"duration-200 ease-in","leave-from":"opacity-100","leave-to":"opacity-0"},{default:I(()=>[rn]),_:1}),E("div",sn,[E("div",{class:ve(["flex min-h-full items-center justify-center p-4 text-center",t.classes.wrapper])},[N(L(Ae),{as:"template",enter:"duration-300 ease-out","enter-from":"opacity-0 scale-95","enter-to":"opacity-100 scale-100",leave:"duration-200 ease-in","leave-from":"opacity-100 scale-100","leave-to":"opacity-0 scale-95"},{default:I(()=>[N(L(Qt),{class:ve(["dark:bg-muted-800 w-full bg-white text-left align-middle shadow-xl transition-all",L(l)])},{default:I(()=>[ge(a.$slots,"header"),ge(a.$slots,"default"),"footer"in a.$slots?(A(),j("div",{key:0,class:ve(["flex w-full items-center gap-x-2",[t.footerAlign==="center"&&"justify-center",t.footerAlign==="end"&&"justify-end",t.footerAlign==="between"&&"justify-between"]])},[ge(a.$slots,"footer")],2)):me("",!0)]),_:3},8,["class"])]),_:3})],2)])]),_:3})])]),_:3},8,["show"]))}}),cn={class:"px-2 pb-2"},fn={class:"flex w-full justify-between"},pn=E("span",null,"Search",-1),vn={key:0,class:"text-xs opacity-60"},mn=E("kbd",null,"в†‘",-1),hn=E("kbd",null,"в†“",-1),yn={key:1,class:"text-xs opacity-60"},bn=E("kbd",null,"k",-1),wn={key:0},gn=E("div",{class:"px-3 pt-2"},[E("span",{class:"nui-text-500 text-[0.65rem] font-medium uppercase tracking-wider"}," Documentation Hub ")],-1),En={key:1},_n=E("div",{class:"px-3 pt-2"},[E("span",{class:"nui-text-500 text-[0.65rem] font-medium uppercase tracking-wider"}," Pages ")],-1),xn={class:"flex flex-col items-center py-3 text-center"},$n={class:"scale-[0.8]"},Wn=V({__name:"DemoAppSearch",setup(e){const n=$t(),t=bt("search-open",()=>!1),l=y("");Tt("k",c=>{(n.value?c.metaKey:c.ctrlKey)&&(c.preventDefault(),t.value=!t.value)});const{data:a}=Lt(()=>l.value?queryContent().where({$and:[{_type:"markdown",_empty:!1},{$or:[{components:{$icontains:l.value}},{title:{$regex:`/${l.value.replaceAll(" ",".*")}/i`}},{_path:{$regex:`/${l.value.replaceAll(" ",".*")}/i`}}]}]}).limit(6).find():Promise.resolve([]),{watch:[l]},"$6RdBYde5GH"),o=wt(),r=v(()=>{if(!l.value)return[];const c=[],d=new RegExp(l.value,"i");function b(g){var x,B,T,D,q,R,M,f;for(const w of g)if(w.children)b(w.children);else{if(w.path.includes(":"))continue;((B=(x=w.meta)==null?void 0:x.preview)!=null&&B.title&&d.test((D=(T=w.meta)==null?void 0:T.preview)==null?void 0:D.title)||(R=(q=w.meta)==null?void 0:q.preview)!=null&&R.description&&d.test((f=(M=w.meta)==null?void 0:M.preview)==null?void 0:f.description))&&c.push(w)}}return b(o.options.routes),console.log(c),c.slice(0,6)}),s=v(()=>{var d;const c=6-Math.min(r.value.length,3);return(d=a.value)==null?void 0:d.slice(0,c)}),i=v(()=>{var d,b;const c=6-Math.min(((d=a.value)==null?void 0:d.length)||0,3);return(b=r.value)==null?void 0:b.slice(0,c)}),u=v(()=>{var c,d;return!!((c=s.value)!=null&&c.length||(d=i.value)!=null&&d.length)});function p(){t.value=!1}const _=St();return(c,d)=>{const b=tt,g=nt,x=lt,B=at,T=ot,D=dn,q=gt("focus");return A(),j("div",null,[N(D,{classes:{wrapper:"!items-start pt-20",dialog:"p-3 rounded-xl"},open:L(t),size:"md",onClose:d[1]||(d[1]=R=>t.value=!1)},{default:I(()=>[N(x,{"next-keys":"ArrowDown","prev-keys":"ArrowUp"},{default:I(()=>{var R,M;return[E("div",cn,[Et((A(),Ve(b,{type:"search",shape:"curved",icon:"lucide:search",modelValue:L(l),"onUpdate:modelValue":d[0]||(d[0]=f=>_t(l)?l.value=f:null),placeholder:"Ex: armory or Firelands...","color-focus":""},{label:I(()=>[E("span",fn,[pn,L(u)?(A(),j("span",vn,[oe(" navigate with "),mn,oe(" and "),hn])):L(l)?me("",!0):(A(),j("span",yn,[oe(" press "),E("kbd",null,xt(L(_)),1),oe(" + "),bn,oe(" to open ")]))])]),_:1},8,["modelValue"])),[[q]])]),(R=L(s))!=null&&R.length?(A(),j("div",wn,[gn,E("ul",null,[(A(!0),j(Le,null,Oe(L(s),f=>{var w;return A(),j("li",{key:f==null?void 0:f._path,class:""},[N(g,{to:f==null?void 0:f._path,search:L(l),title:f==null?void 0:f.title,subtitle:f==null?void 0:f._path,icon:(w=f==null?void 0:f.icon)==null?void 0:w.src,onClickPassive:p},null,8,["to","search","title","subtitle","icon"])])}),128))])])):me("",!0),(M=L(i))!=null&&M.length?(A(),j("div",En,[_n,E("ul",null,[(A(!0),j(Le,null,Oe(L(i),f=>{var w,k,U,ae;return A(),j("li",{key:f==null?void 0:f.name,class:""},[N(g,{to:{name:f==null?void 0:f.name},search:L(l),title:(k=(w=f==null?void 0:f.meta)==null?void 0:w.preview)==null?void 0:k.title,subtitle:(ae=(U=f==null?void 0:f.meta)==null?void 0:U.preview)==null?void 0:ae.description,onClickPassive:p},null,8,["to","search","title","subtitle"])])}),128))])])):me("",!0)]}),_:1}),E("div",xn,[E("div",$n,[N(B,{size:"xs",weight:"medium",class:"text-muted-400"},{default:I(()=>[oe("Powered by")]),_:1}),N(T,{class:"text-muted-400 mx-auto w-20 mt-2"})])])]),_:1},8,["open"])])}}});export{Wn as default};