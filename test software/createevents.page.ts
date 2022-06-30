import { Time } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { EventsService } from '../events.service';
import {AngularFirestore} from '@angular/fire/firestore';
import {AngularFireAuth} from '@angular/fire/auth';
import {map,take} from 'rxjs/operators';
import {Observable} from 'rxjs';
import {ActivatedRoute, Router} from '@angular/router';
import { UsersService } from '../users.service';
import * as firebase from 'firebase/app';

@Component({
  selector: 'app-createevents',
  templateUrl: './createevents.page.html',
  styleUrls: ['./createevents.page.scss'],
})
export class CreateeventsPage implements OnInit {

  constructor(private usr:UsersService,private router:Router,public evnt:EventsService,private afs:AngularFirestore,private afauth:AngularFireAuth) 
  { }

  date:Date;
  stime:any;
  etime:any;
  date1:string;
  venue:string;
  name:string;
  time:string;
  percentage:number;
  userid:string="";
  setusers:Observable<any[]>;//=this.usr.selectuser("james");
  arrusr:any[]=[];
  ownerdoc:any={};
  ownername:string;
  vars:boolean=false;

  ngOnInit() {
    
   /* firebase.auth().onAuthStateChanged(function(user) {
      if (user) {
        this.userid=firebase.auth().currentUser.uid;
        console.log(user);
      }
    }
    )
    this.method();*/

  }


  method()
  {
   
    this.userid=firebase.auth().currentUser.uid;
    firebase.firestore().collection("Users").doc(this.userid).get().then(
      (doc)=>{
        this.ownerdoc=doc.data().name;
        console.log("document data is: "+doc.data().name);
        console.log("ownername is: "+this.ownerdoc);
        this.ownername=this.ownerdoc;
        this.setusers=this.usr.selectuser(this.ownerdoc);
        this.vars=true;
        this.setusers.subscribe(data=>{
          this.arrusr=[];
          for(let i=0;i<data.length;i+=1)
          {
            this.arrusr.push({name:data[i].name,ischecked:false});
            console.log(this.arrusr[i])
          }
        })
      }
    )
    /*this.afs.collection("Users").doc(this.userid).valueChanges().pipe(
      map(data=>
        {
          data.data;
        })
    ).subscribe(
      (data)=>{
         this.ownerdoc=data;
      }
    ) */
    
  }

  evts2:any;
  querarr:string[];

  addevent()
  {
    this.userid=this.afauth.auth.currentUser.uid;
    this.date1=String(this.date);
    this.evts2= {
      date:this.date1,
      venue:this.venue,
      name:this.name,
      starttime:this.stime,
      endtime:this.etime,
      usernames:this.querarr
     
     }
     console.log("check :"+this.evts2.name)
    //this.evnt.addevent(this.date1,this.venue,this.name,this.stime,this.etime);
    this.router.navigate(["/payment",{
      date:this.date1,
      venue:this.venue,
      name:this.name,
      starttime:this.stime,
      endtime:this.etime,
      usernames:this.querarr
     
     }]);
  }





  arr:any[];
  stime1:number;
  etime1:number;
  shours:number;
  sminutes:number;
  lhours:number;
  lminutes:number;
  snumstring:string[];
  enumstring:string[];
  sorg:Number;
  eorg:Number;
  narr:any[]=[];
  narr1:any[]=[];
  l:any;
  count:number;
  countuser:number;
  commontime:any[]=[];
  altarr:any[]=[];
  datearr:any[]=[];
  k:number=0;
  maxdate:string;
  alternate:string;
  dates3:string;
  
  





  adddata(data1:any[])
  {

    this.countuser=0;
    console.log(" start count user is "+this.countuser);
    this.arr=data1;   //array of free schedule of each users [[],[].....]
    this.l=this.arr.length;  //no of users
    console.log("arr is: "+this.arr[0]);
      this.percentage=0;
      this.dates3=this.date.toString();
      this.narr=[];
    
    for(let i=0;i<this.arr.length;i+=1)
    {
      console.log("arr length: "+this.arr.length);
      console.log("arr : "+this.arr[i]);
      console.log("arr : "+this.arr[i][0].date);
      this.narr1=[];
      
        console.log("arr[][] : "+this.arr[i].length);
        for(let k=0;k<this.arr[i].length;k+=1)
        {
      if(this.arr[i][k].date==this.dates3)
      {
        console.log("arr[][][] : "+this.arr[i][k].date);
        this.narr1.push({starttime:this.arr[i][k].starttime,
          endtime:this.arr[i][k].endtime});
          console.log("narr1 : "+this.narr1);
      }
    }
    
    console.log("narr1 : "+this.narr1);
    this.narr.push(this.narr1);
    console.log("narr : "+this.narr[i]);
    }

    console.log("narr is: "+this.narr);

    for(let j=0;j<this.narr.length;j+=1)
    {
      this.count=0;
      this.arr=this.narr[j];
      console.log(this.arr[0])
    for(let i=0;i<this.arr.length;i+=1){
      this.snumstring=this.arr[i].starttime.split(":");
      this.shours=Number(this.snumstring[0]);
      this.sminutes=Number(this.snumstring[1]);

      this.enumstring=this.arr[i].endtime.split(":");
      this.lhours=Number(this.enumstring[0]);
      this.lminutes=Number(this.enumstring[1]);

      this.stime1=(this.shours*60)+this.sminutes; //start time of event
      this.etime1=(this.lhours*60)+this.lminutes; //end time of event

      this.snumstring=this.stime.split(":");
      this.shours=Number(this.snumstring[0]);
      this.sminutes=Number(this.snumstring[1]);

      this.sorg=(this.shours*60)+this.sminutes;

      this.enumstring=this.etime.split(":");
      this.lhours=Number(this.enumstring[0]);
      this.lminutes=Number(this.enumstring[1]);

      this.eorg=(this.lhours*60)+this.lminutes;


      if(this.sorg>=this.stime1 && this.sorg<=this.etime1)
      {
        if(this.eorg>=this.stime1 && this.eorg<=this.etime1)
        {this.count=1;}
      }

    }
    if(this.count==1)
    {
      this.countuser+=1;
      console.log("count user is "+this.countuser);
    }
    }
    this.percentage=(this.countuser*100)/this.l;
   console.log("count user is "+this.countuser*100);

    this.altarr=data1;

   this.alternatedate(this.altarr);
  }


  //max date
  alternatedate(data:any[][])
    {
      this.arr=data;   //array of free schedule of each users [[],[].....]
    this.l=this.arr.length;  //no of users
    //console.log("arr is: "+this.arr[0]);
      //this.percentage=0;
    this.narr=[];
    for(let i=0;i<this.arr.length;i+=1)
    {
      this.narr1=[];
      this.datearr=[];
      this.k=0;
      for(let j=0;j<this.arr[i].length;j+=1)
      {
        if(this.datearr.length==0)
        {
          this.datearr[this.k]=this.arr[i][j].date;
          this.k+=1;
        }
        else{
          this.datearr.push(this.arr[i][j].date);
        }
     
    }

    }
     
  this.maxdate="";
  this.maxdate=this.mode(this.datearr);
  this.alternate="";
  this.alternate="Date: "+this.maxdate+" ";
  console.log("max date is: "+this.maxdate);
  this.alternatetime(data,this.maxdate);
    
  }

snumstrings:string="";
timarr2:string[]=[];
maxtime:number;
//alternate time 
  alternatetime(data:any[][],maxdate:string)
  {
    this.maxtime=0;
    this.arr=data;   //array of free schedule of each users [[],[].....]
    this.l=this.arr.length;  //no of users
    console.log("arr is: "+this.arr);
      //this.percentage=0;
      this.narr=[];
    
    for(let i=0;i<this.arr.length;i+=1)
    {
      this.narr1=[];
      for(let j=0;j<this.arr[i].length;j+=1)
      {
      if(this.arr[i][j].date==maxdate)
      {
        this.narr1.push({starttime:this.arr[i][j].starttime,
          endtime:this.arr[i][j].endtime});
      }
    }
    this.narr.push(this.narr1);
    }
   // console.log("narr is "+this.narr);

    this.timarr2=[];
    for(let j=0;j<this.narr.length;j+=1)
    {
      this.count=0;
      this.arr=this.narr[j];
      
    for(let i=0;i<this.arr.length;i+=1){
      this.snumstrings=this.arr[i].starttime+"-"+this.arr[i].endtime;
     
        this.timarr2.push(this.snumstrings);
       // console.log("time arr is "+this.snumstrings);
    
    }
    
    }
    console.log("time arr is "+this.timarr2)

    this.maxtime=this.mode(this.timarr2);
    this.alternate+="Time: "+this.maxtime;
    console.log("max time is: "+this.maxtime);


  }

  mode(array)
{
    if(array.length == 0)
        return null;
    var modeMap = {};
    var maxEl = array[0], maxCount = 1;
    for(var i = 0; i < array.length; i++)
    {
        var el = array[i];
        if(modeMap[el] == null)
            modeMap[el] = 1;
        else
            modeMap[el]++;  
        if(modeMap[el] > maxCount)
        {
            maxEl = el;
            maxCount = modeMap[el];
        }
    }
    return maxEl;
}


  enable(name:string,venues:string)
  {
    this.afs.collection("Votes").doc(name).set(
      {votes:[],
        oldvenue:venues,
        newvenue:""
      }
    ).then(docref=>{
      alert("successfully created "+docref);
    })
  }  


  testdata(arr:any[])
    {
      for(let i=0;i<arr.length;i+=1)
    {
      for(let j=0;j<arr[i].length;j+=1)
      {
        console.log("date is " +arr[i][j].date)
      }
      console.log("break ")
    }
  }

logout()
{
  this.afauth.auth.signOut().then(
    ()=>{
      alert("User has logged out")
      this.router.navigate(["/login"])
    }
  )
}
  checktime()
  {
    this.querarr=[];
    for(let i=0;i<this.arrusr.length;i+=1)
    {
      console.log(this.arrusr[i].name)
      if(this.arrusr[i].ischecked==true)
      {
        this.querarr.push(this.arrusr[i].name)
      }
    }
    console.log(this.querarr)
    if(this.querarr.length==0)
    {
      this.afs.collection<any[]>("Users",ref=>ref.where('name','!=',this.ownername)).snapshotChanges().pipe(
        map(docs=>{
          return docs.map(a=>
            {
              const datas=a.payload.doc.data();
              const datas2= datas["freeschedule"];
              console.log(datas2);
              return datas2;
  
            }
          )
        })
      ).subscribe(data=>
        {
          //this.adddata(data);
         // console.log("arr is: "+data[1][0].starttime);
          this.adddata(data);
        });
    }
    else{
    this.afs.collection<any[]>("Users",ref=>ref.where('name','in',this.querarr)).snapshotChanges().pipe(
      map(docs=>{
        return docs.map(a=>
          {
            const datas=a.payload.doc.data();
            const datas2= datas["freeschedule"];
            console.log(datas2);
            return datas2;

          }
        )
      })
    ).subscribe(data=>
      {
        //this.adddata(data);
       // console.log("arr is: "+data[1][0].starttime);
       console.log(data)
        this.adddata(data);
      });

    }
   
    
  }

  

}
