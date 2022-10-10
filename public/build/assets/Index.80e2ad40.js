import{L as l}from"./Layout.bc4a3663.js";import{_ as a}from"./_plugin-vue_export-helper.cdc0426e.js";import{r as c,o as n,e as d,w as m,b as e,f as s}from"./app.261a54f7.js";import"./AppHeader.a9e93de0.js";const o={filterSwitch(){document.getElementById("filter-more").classList.toggle("hidden")},switcherActiveTask(){document.querySelector(".projects-tasks__list").classList.toggle("hidden"),document.querySelector(".projects-tasks__list").classList.toggle("h-0")}},p={name:"Index",methods:{filterSwitch(){o.filterSwitch()},switcherActiveTask(){o.switcherActiveTask()}},components:{Layout:l}},u=e("div",{class:"breadcrumb-container rounded mb-4"},[e("ol",{class:"list-none flex"},[e("li",{class:"text-slate-500 breadcrumb-item"},[e("a",{href:"#"},"\u0413\u043B\u0430\u0432\u043D\u0430\u044F"),e("span",{class:"mx-1"},"/")]),e("li",{class:"text-slate-500 breadcrumb-item"},[e("a",{href:"#"},"\u0417\u0430\u0434\u0430\u0447\u0438")])])],-1),h={class:"statuses-list flex mb-3"},_={class:"p-1 px-2 rounded-md flex items-center cursor-pointer border border-gray-300 relative"},f=e("span",{class:"mr-2 select-none"},"\u0424\u0438\u043B\u044C\u0442\u0440\u0430\u0446\u0438\u044F",-1),x=e("svg",{xmlns:"http://www.w3.org/2000/svg",height:"20",width:"20"},[e("path",{d:"M9.5 16q-.208 0-.354-.146T9 15.5v-4.729L4.104 4.812q-.187-.25-.052-.531Q4.188 4 4.5 4h11q.312 0 .448.281.135.281-.052.531L11 10.771V15.5q0 .208-.146.354T10.5 16Zm.5-6.375L13.375 5.5H6.604Zm0 0Z"})],-1),v=[f,x],b=e("form",{id:"filter-more",class:"bg-white rounded-md w-fit border border-gray-300 p-2 absolute top-10 scale-up-center w-200px hidden left-0 select-none"},[e("label",{class:"block"},[e("span",{class:"text-gray-700"},"\u0421\u0442\u0430\u0442\u0443\u0441\u044B"),e("select",{class:"block mt-1 rounded cursor-pointer"},[e("option",null,"\u0412\u0441\u0435"),e("option",null,"\u041D\u043E\u0432\u044B\u0435"),e("option",null,"Birthday"),e("option",null,"Other")])])],-1),w=e("hr",null,null,-1),g=e("div",{class:"projects-list mt-4"},[e("div",{class:"projects-item p-2 mt-8"},[e("div",{class:"projects-item__header flex justify-between"},[e("div",{class:"w-2/5"},[e("p",{class:"font-bold"},[s("\u041D\u0430\u0437\u0432\u0430\u043D\u0438\u0435 \u0437\u0430\u0434\u0430\u0447\u0438 / "),e("a",{class:"text-emerald-500",href:"#"},"\u041D\u0430\u0437\u0432\u0430\u043D\u0438\u0435 \u043F\u0440\u043E\u0435\u043A\u0442\u0430")]),e("div",{class:"task-item__description mt-1.5 flex items-center text-sm"},[e("p",{class:"expiration-date"},"\u0432\u044B\u043F\u043E\u043B\u043D\u0438\u0442\u044C \u0434\u043E: 20.08.2002"),e("p",{class:"ml-3"},[s("\u0421\u0442\u0430\u0442\u0443\u0441: "),e("span",{class:"bg-emerald-500 text-white rounded p-0.5 px-1"},"\u0410\u043A\u0442\u0438\u0432\u043D\u044B\u0439")])])]),e("div",{class:"w-3/5"}," Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque ex, excepturi exercitationem, fugiat id molestiae nulla reiciendis sed soluta, tenetur vel vero voluptas voluptates! Debitis error et maiores molestiae veniam. ")])])],-1);function k(y,t,L,q,j,i){const r=c("Layout");return n(),d(r,null,{default:m(()=>[u,e("div",h,[e("div",_,[e("div",{id:"filter-switcher",class:"flex items-center",onClick:t[0]||(t[0]=S=>i.filterSwitch())},v),b])]),w,g]),_:1})}const C=a(p,[["render",k]]);export{C as default};
