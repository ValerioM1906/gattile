import { useState, useEffect } from "react";
function Principale(){
    const [dati, setDati]=useState([]);
    useEffect=>(()=>{
        fetch('gattile/backend/api/gattiApi.php')
        .then(data=>{
            setDati(data)
        })
    }, [])
    return (
        <p>FATTO</p>
    )
}