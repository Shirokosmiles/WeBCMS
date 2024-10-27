import{_ as A}from"./nuxt-link.43670e21.js";import K from"./Icon.ac5bc306.js";import{r as C,u as U,_ as W}from"./window-scroll.2d09d532.js";import{u as z}from"./sidebar.605e7ca8.js";import{d as w,o,a as c,i as u,t as F,f as _,n as S,m as q,g as B,e as t,w as N,b as $,a1 as M,D as f,h as v,c as y,E as x,F as k,L as E,a2 as G,u as L,R as J,j as Q,r as X,q as Y}from"./entry.35cb4625.js";import{_ as Z}from"./BaseHeading.vue.0c3990d9.js";const ee={class:"flex h-16 w-full items-center justify-center"},te=["data-tooltip"],ae=w({__name:"TairoSidebarNavigationItem",props:{sidebar:{}},setup(h){const e=h,{currentName:n,isOpen:s}=z();function p(){if(typeof e.sidebar.click=="function")return e.sidebar.click();n.value=e.sidebar.title,s.value=!0}return(m,d)=>{const b=K,r=A;return o(),c("div",ee,[u("span",null,F(e.sidebar.order),1),e.sidebar.component?(o(),_(B(("resolveComponentOrNative"in m?m.resolveComponentOrNative:t(C))(e.sidebar.component)),S(q({key:0},e.sidebar.props)),null,16)):e.sidebar.to&&e.sidebar.icon?(o(),_(r,{key:1,to:e.sidebar.to,class:"text-muted-400 flex h-12 w-12 items-center justify-center rounded-2xl transition-colors duration-300","data-tooltip-position":"right","data-tooltip":e.sidebar.title},{default:N(()=>[$(b,S(M(e.sidebar.icon)),null,16)]),_:1},8,["to","data-tooltip"])):e.sidebar.icon?(o(),c("button",{key:2,type:"button",class:f(["flex h-12 w-12 items-center justify-center rounded-2xl transition-colors duration-300",t(n)===e.sidebar.title?"bg-primary-100 text-primary-500 dark:bg-primary-500/10":"text-muted-400"]),"data-tooltip-position":"right","data-tooltip":e.sidebar.title,onClick:p},[$(b,S(M(e.sidebar.icon)),null,16)],10,te)):v("",!0)])}}}),oe={class:"pointer-events-none fixed start-0 top-0 z-[60] flex h-full xl:z-10"},re={class:"mt-auto"},ne=w({__name:"TairoSidebarNavigation",props:{subsidebar:{type:Boolean,default:!0},expanded:{type:Boolean,default:!1}},setup(h){const e=h,{isOpen:n,current:s,sidebars:p}=z(),m=y(()=>{var r;return(r=p.value)==null?void 0:r.filter(l=>!l.position||l.position==="start")}),d=y(()=>{var r;return(r=p.value)==null?void 0:r.filter(l=>l.position==="end")}),b=y(()=>{var r,l;return!!(e.subsidebar!==!1&&((l=(r=s.value)==null?void 0:r.subsidebar)!=null&&l.component))});return(r,l)=>{const a=ae;return o(),c("div",oe,[u("div",{class:f(["border-muted-200 dark:border-muted-700 dark:bg-muted-800 pointer-events-auto relative z-20 flex h-full w-[80px] flex-col border-r bg-white transition-all duration-300",t(n)?"":"-translate-x-full xl:translate-x-0"])},[x(r.$slots,"default"),u("div",null,[x(r.$slots,"top"),(o(!0),c(k,null,E(t(m),i=>(o(),_(a,{key:i.title,sidebar:i},null,8,["sidebar"]))),128))]),u("div",re,[(o(!0),c(k,null,E(t(d),i=>(o(),_(a,{key:i.title,sidebar:i},null,8,["sidebar"]))),128)),x(r.$slots,"end")])],2),t(b)?(o(),c("div",{key:0,class:f(["border-muted-200 dark:border-muted-700 dark:bg-muted-800 pointer-events-auto relative z-10 h-full w-[220px] border-r bg-white transition-all duration-300",t(n)?"":"rtl:translate-x-[calc(100%_+_80px)] translate-x-[calc(-100%_-_80px)]"])},[x(r.$slots,"subnav",{},()=>{var i,g,T,O,j;return[(o(),_(G,null,[(g=(i=t(s))==null?void 0:i.subsidebar)!=null&&g.component?(o(),_(B(("resolveComponentOrNative"in r?r.resolveComponentOrNative:t(C))((T=t(s).subsidebar)==null?void 0:T.component)),{key:(j=(O=t(s))==null?void 0:O.subsidebar)==null?void 0:j.component})):v("",!0)],1024))]})],2)):v("",!0)])}}}),se=w({__name:"TairoSidebarBurger",setup(h){const{isOpen:e,toggle:n}=z();return(s,p)=>(o(),c("button",{type:"button",class:"flex h-10 w-10 items-center justify-center",onClick:p[0]||(p[0]=(...m)=>t(n)&&t(n)(...m))},[u("div",{class:f(["relative h-5 w-5",t(e)?"scale-90":""])},[u("span",{class:f(["bg-primary-500 absolute block h-0.5 w-full transition-all duration-300",t(e)?"-rotate-45 rtl:rotate-45 max-w-[75%] top-1":"top-0.5"])},null,2),u("span",{class:f(["bg-primary-500 absolute top-1/2 block h-0.5 w-full max-w-[50%] transition-all duration-300",t(e)?"opacity-0 translate-x-4":""])},null,2),u("span",{class:f(["bg-primary-500 absolute block h-0.5 w-full transition-all duration-300",t(e)?"rotate-45 rtl:-rotate-45 max-w-[75%] bottom-1":"bottom-0"])},null,2)],2)]))}}),le={class:"flex items-center gap-2"},ie=w({__name:"TairoSidebarTools",setup(h){const e=L();return(n,s)=>{var p,m;return o(),c("div",le,[(o(!0),c(k,null,E((m=(p=t(e).tairo.sidebar)==null?void 0:p.toolbar)==null?void 0:m.tools,d=>(o(),c(k,null,[d.component?(o(),_(B(("resolveComponentOrNative"in n?n.resolveComponentOrNative:t(C))(d.component)),q({key:d.component},d.props),null,16)):v("",!0)],64))),256))])}}}),ue=u("div",{class:"ms-auto"},null,-1),de=w({__name:"TairoSidebarToolbar",props:{sidebar:{type:Boolean,default:!0},horizontalScroll:{type:Boolean}},setup(h){const e=h,n=L(),{hasSubsidebar:s}=z(),p=J(),m=y(()=>{var d,b;return e.sidebar&&((b=(d=n.tairo.sidebar)==null?void 0:d.toolbar)==null?void 0:b.showNavBurger)&&s.value});return(d,b)=>{var i,g;const r=se,l=Z,a=ie;return o(),c("div",{class:f(["relative z-50 mb-5 flex h-16 items-center gap-2",e.horizontalScroll&&"pe-4 xl:pe-10"])},[t(m)?(o(),_(r,{key:0,class:"-ms-3"})):v("",!0),(g=(i=t(n).tairo.sidebar)==null?void 0:i.toolbar)!=null&&g.showTitle?(o(),_(l,{key:1,as:"h1",size:"2xl",weight:"light",class:"text-muted-800 hidden dark:text-white md:block"},{default:N(()=>[x(d.$slots,"title",{},()=>[Q(F(t(p).meta.title),1)])]),_:3})):v("",!0),ue,$(a,{class:"h-16"})],2)}}}),ce=w({__name:"TairoSidebarCircularMenu",setup(h){const{y:e}=U(),n=L(),s=X(!1),p=y(()=>(e.value<60&&(s.value=!1),e.value>60)),m=["translate-x-[-6.5em] translate-y-[-0.25em]","translate-x-[-5.75em] translate-y-[3em]","translate-x-[-3.15em] translate-y-[5.5em]","translate-x-[0em] translate-y-[6.5em]"],d=y(()=>{var b,r,l,a;return((a=(l=(r=(b=n.tairo)==null?void 0:b.sidebar)==null?void 0:r.circularMenu)==null?void 0:l.tools)==null?void 0:a.slice(0,4))||[]});return(b,r)=>(o(),c("div",{class:f(["after:bg-primary-600 after:shadow-primary-500/50 dark:after:shadow-muted-800/10 fixed end-[1em] top-[0.6em] z-[90] transition-transform duration-300 after:absolute after:end-0 after:top-0 after:block after:h-12 after:w-12 after:rounded-full after:shadow-lg after:transition-transform after:duration-300 after:content-['']",[t(s)?"after:ease-[cubic-bezier(0.68, 1.55, 0.265, 1)] after:scale-[5.5]":"",t(p)?"":"-translate-y-24"]])},[u("button",{type:"button",class:"bg-primary-500 shadow-primary-500/50 dark:shadow-muted-800/10 relative z-30 flex h-12 w-12 items-center justify-center rounded-full text-white shadow-lg",onClick:r[0]||(r[0]=l=>s.value=!t(s))},[u("span",{class:f(["relative block h-3 w-3 transition-all duration-300",t(s)?"scale-90 top-0":"-top-0.5"])},[u("span",{class:f(["bg-muted-50 absolute block h-0.5 w-full transition-all duration-300",t(s)?"-rotate-45 top-1":"top-0.5"])},null,2),u("span",{class:f(["bg-muted-50 absolute top-1/2 block h-0.5 w-full transition-all duration-300",t(s)?"opacity-0 translate-x-4":""])},null,2),u("span",{class:f(["bg-muted-50 absolute block h-0.5 w-full transition-all duration-300",t(s)?"rotate-45 bottom-1.5":"bottom-0"])},null,2)],2)]),u("div",null,[(o(!0),c(k,null,E(t(d),(l,a)=>(o(),c(k,null,[l.component?(o(),c("div",{key:l.component,class:f(["absolute end-[0.2em] top-[0.2em] z-20 flex items-center justify-center transition-all duration-300",t(s)?m[a]:"translate-x-0 translate-y-0"])},[(o(),_(B(("resolveComponentOrNative"in b?b.resolveComponentOrNative:t(C))(l.component)),S(M(l.props)),null,16))],2)):v("",!0)],64))),256))])],2))}}),pe={class:"bg-muted-100 dark:bg-muted-900 pb-20"},me={key:0,class:"flex h-16 w-full items-center justify-center"},ye=w({__name:"TairoSidebarLayout",props:{sidebar:{type:Boolean,default:!0},subsidebar:{type:Boolean,default:!0},toolbar:{type:Boolean,default:!0},circularMenu:{type:Boolean,default:!0},condensed:{type:Boolean},horizontalScroll:{type:Boolean}},setup(h){const e=h,n=L(),{setup:s,currentName:p,isOpen:m}=z();s(),Y(()=>{p.value="",m.value=void 0});const d=y(()=>{var a,i;return((i=(a=n.tairo.sidebar)==null?void 0:a.navigation)==null?void 0:i.enabled)!==!1&&e.sidebar!==!1}),b=y(()=>{var a,i;return((i=(a=n.tairo.sidebar)==null?void 0:a.toolbar)==null?void 0:i.enabled)!==!1&&e.toolbar!==!1}),r=y(()=>{var a,i;return((i=(a=n.tairo.sidebar)==null?void 0:a.circularMenu)==null?void 0:i.enabled)!==!1&&e.circularMenu!==!1}),l=y(()=>{if(e.condensed)return"bg-muted-100 dark:bg-muted-900 relative min-h-screen w-full overflow-x-hidden";if(!d.value)return"bg-muted-100 dark:bg-muted-900 relative min-h-screen w-full overflow-x-hidden px-4 transition-all duration-300 xl:px-10";const a=["bg-muted-100 dark:bg-muted-900 relative min-h-screen w-full overflow-x-hidden px-4 transition-all duration-300 xl:px-10"];return m.value?a.push("xl:max-w-[calc(100%_-_300px)] xl:ms-[300px]"):a.push("xl:max-w-[calc(100%_-_80px)] xl:ms-[80px]"),e.horizontalScroll&&a.push("!pe-0 xl:!pe-0"),a});return(a,i)=>{const g=A,T=ne,O=de,j=W,H=ce;return o(),c("div",pe,[x(a.$slots,"sidebar",{},()=>[t(d)?(o(),_(T,{key:0,subsidebar:e.subsidebar},{default:N(()=>{var I,P,V;return[(V=(P=(I=t(n).tairo.sidebar)==null?void 0:I.navigation)==null?void 0:P.logo)!=null&&V.component?(o(),c("div",me,[x(a.$slots,"logo",{},()=>[$(g,{to:"/",class:"flex items-center justify-center"},{default:N(()=>{var D,R;return[(o(),_(B(("resolveComponentOrNative"in a?a.resolveComponentOrNative:t(C))((D=t(n).tairo.sidebar)==null?void 0:D.navigation.logo.component)),S(M((R=t(n).tairo.sidebar)==null?void 0:R.navigation.logo.props)),null,16))]}),_:1})])])):v("",!0)]}),_:3},8,["subsidebar"])):v("",!0)]),u("div",{class:f(t(l))},[u("div",{class:f([e.condensed&&!e.horizontalScroll&&"w-full",!e.condensed&&e.horizontalScroll&&"mx-auto w-full",!e.condensed&&!e.horizontalScroll&&"mx-auto w-full max-w-7xl"])},[x(a.$slots,"toolbar",{},()=>[t(b)?(o(),_(O,{key:0,sidebar:e.sidebar,"horizontal-scroll":e.horizontalScroll},{title:N(()=>[x(a.$slots,"toolbar-title")]),_:3},8,["sidebar","horizontal-scroll"])):v("",!0)]),u("main",null,[x(a.$slots,"default")])],2)],2),$(j),t(r)?(o(),_(H,{key:0})):v("",!0)])}}});export{ye as _};