(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-43443254"],{"54c8":function(e,t,n){},"839e":function(e,t,n){"use strict";n("54c8")},"93e3":function(e,t,n){"use strict";n.r(t);var r=n("7a23"),c={style:{"margin-bottom":"400px"}},u={class:"col-md-12"},s=Object(r["g"])("h4",null," Data Dosen ",-1),a=Object(r["g"])("br",null,null,-1),l={class:"table"},o=Object(r["g"])("thead",{style:{"font-weight":"800"}},[Object(r["g"])("td",null," NIM "),Object(r["g"])("td",null," Nama Lengkap "),Object(r["g"])("td",null," Program Studi ")],-1);function i(e,t,n,i,b,d){return Object(r["s"])(),Object(r["d"])("div",c,[Object(r["g"])("div",u,[s,a,Object(r["g"])("table",l,[o,(Object(r["s"])(!0),Object(r["d"])(r["a"],null,Object(r["w"])(b.courses,(function(e,t){return Object(r["s"])(),Object(r["d"])("tr",{key:t},[Object(r["g"])("td",null,Object(r["A"])(e.no_induk),1),Object(r["g"])("td",null,Object(r["A"])(e.nama_lengkap),1),Object(r["g"])("td",null,Object(r["A"])(e.program_studi),1)])})),128))])])])}var b=n("1da1"),d=n("d4ec"),g=n("bee2"),j=(n("96cf"),n("bc3a")),O=n.n(j),f=function(){function e(){Object(d["a"])(this,e)}return Object(g["a"])(e,[{key:"getAll",value:function(){var e=Object(b["a"])(regeneratorRuntime.mark((function e(){return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,O.a.get("/api/v2/lecturers");case 2:return e.abrupt("return",e.sent);case 3:case"end":return e.stop()}}),e)})));function t(){return e.apply(this,arguments)}return t}()}]),e}(),h=new f,p={name:"courses-list",data:function(){return{courses:[],currentCourse:null,currentIndex:-1,title:""}},methods:{retrieveCourses:function(){var e=this;h.getAll().then((function(t){e.courses=t.data.result,console.log(t.data.result)})).catch((function(e){console.log(e)}))},refreshList:function(){this.retrievecourses(),this.currentCourse=null,this.currentIndex=-1}},mounted:function(){this.retrieveCourses()}};n("839e");p.render=i;t["default"]=p}}]);
//# sourceMappingURL=chunk-43443254.b0f2a9c2.js.map