import L from"./Icon.ac5bc306.js";import{u as y}from"./sidebar.605e7ca8.js";import{d as v,o as e,a as o,e as _,t as h,h as x,i as a,b as p,w as T,r as g,R as P,c as V,v as A,D as b,S as F,F as w,L as M,f as k,m as C,E as S}from"./entry.35cb4625.js";import{_ as B}from"./_plugin-vue_export-helper.c27b6911.js";import{_ as N}from"./nuxt-link.43670e21.js";import{u as D}from"./tailwind.77174e66.js";const I={class:"flex h-16 w-full items-center px-6"},W={key:0,class:"font-heading text-muted-700 text-lg font-light capitalize dark:text-white"},pt=v({__name:"TairoSubsidebarHeader",setup(r){const{current:t,isOpen:n}=y();return(i,c)=>{const u=L;return e(),o("div",I,[_(t)?(e(),o("div",W,h(_(t).title),1)):x("",!0),a("button",{type:"button",class:"text-muted-400 hover:bg-muted-100 hover:text-muted-600 ms-auto flex h-10 w-10 items-center justify-center rounded-full transition-colors duration-300 xl:hidden",onClick:c[0]||(c[0]=m=>n.value=!1)},[p(u,{name:"feather:chevron-left",class:"h-6 w-6"})])])}}}),j={},H={class:"border-muted-200 dark:border-muted-700 my-3 h-px w-full border-t"};function O(r,t){return e(),o("li",H)}const q=B(j,[["render",O]]),G={class:"mb-1 flex min-h-[2rem] items-center"},J={class:"font-sans text-sm"},K=v({__name:"TairoSubsidebarMenuLink",props:{name:{},to:{}},setup(r){const t=r,{toggle:n}=y(),{xl:i}=D();function c(){console.log("onClick",t.name,i.value),!i.value&&n()}return(u,m)=>{const l=N;return e(),o("li",G,[p(l,{to:t.to,class:"nui-focus text-muted-400 hover:text-primary-500 flex w-full items-center transition-colors duration-300",onClickPassive:c},{default:T(()=>[a("span",J,h(t.name),1)]),_:1},8,["to"])])}}}),Q={class:"group mb-1 min-h-[2rem]"},U=["onClick"],X={class:"text-muted-400 group-hover:text-primary-500 relative inline-flex items-center gap-2 font-sans text-sm transition-colors duration-300"},Y={key:0,class:"bg-primary-500 absolute -start-3 top-2 h-1 w-1 rounded-full"},Z={key:0,class:"py-2"},tt={class:"font-sans text-xs"},et=v({__name:"TairoSubsidebarMenuCollapseLinks",props:{name:{},children:{}},setup(r){const t=r,n=g(!1),i=P(),c=g(),u=V(()=>t.children.some(s=>s.exact===!0?i.path===s.to:i.path.startsWith(s.to)));A(()=>{u.value&&(n.value=!0)});function m(){var s;n.value=!n.value,n.value||(s=c.value)==null||s.blur()}function l(s){return s.exact&&i.path===s.to||!s.exact&&i.path.startsWith(s.to)}const{toggle:d}=y(),{xl:R}=D();function z(){R.value||d()}return(s,ct)=>{const $=L,E=N;return e(),o("li",Q,[a("a",{ref_key:"buttonRef",ref:c,href:"#",class:"nui-focus relative top-0.5 flex items-center",onClick:F(m,["stop","prevent"])},[a("span",X,[_(u)?(e(),o("span",Y)):x("",!0),a("span",null,h(t.name),1)]),p($,{name:"feather:chevron-down",class:b(["text-muted-400 ms-auto block h-4 w-4 transition-transform duration-300",{"group-focus-within:rotate-180":!_(n),"rotate-180":_(n)}])},null,8,["class"])],8,U),a("div",{class:b(["transition-all duration-150",{"max-h-0 overflow-hidden opacity-0 group-focus-within:max-h-max group-focus-within:overflow-visible group-focus-within:opacity-100":!_(n),"max-h-max opacity-100":_(n)}])},[t!=null&&t.children?(e(),o("ul",Z,[(e(!0),o(w,null,M(t.children,f=>(e(),o("li",{key:f.to,class:"flex h-8 w-full items-center"},[p(E,{to:f.to,class:b([{"text-primary-500":l(f)},"nui-focus text-muted-400 hover:text-primary-500 focus:text-primary-500 flex w-full items-center ps-3 transition-colors duration-300"]),onClickPassive:z},{default:T(()=>[p($,{name:f.icon,class:"me-2 h-5 w-5"},null,8,["name"]),a("span",tt,h(f.name),1)]),_:2},1032,["to","class"])]))),128))])):x("",!0)],2)])}}}),ht=v({__name:"TairoSubsidebarMenu",props:{navigation:{}},setup(r){const t=r;return(n,i)=>{const c=q,u=K,m=et;return e(),o("ul",null,[(e(!0),o(w,null,M(t.navigation,(l,d)=>(e(),o(w,null,["divider"in l?(e(),k(c,{key:`${d}-divider`})):"to"in l?(e(),k(u,C({key:1},l,{key:`${d}-link`}),null,16)):"children"in l?(e(),k(m,C({key:2},l,{key:`${d}-collapse`}),null,16)):x("",!0)],64))),256))])}}}),nt={},ot={class:"flex h-screen flex-col"},st={class:"slimscroll relative h-full w-full overflow-y-auto"},rt={class:"px-6 pb-8"},at=a("div",{class:"dark:from-muted-800 pointer-events-none fixed bottom-0 z-10 h-10 w-[212px] bg-gradient-to-t from-white to-transparent"},null,-1);function it(r,t){return e(),o("div",ot,[S(r.$slots,"header"),a("div",st,[a("div",rt,[S(r.$slots,"default")]),at])])}const xt=B(nt,[["render",it]]);export{pt as _,ht as a,xt as b};