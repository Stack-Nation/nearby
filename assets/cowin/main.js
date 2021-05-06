const BASE = "https://cdn-api.co-vin.in/api";
let Centers = {};
const d = new Date();
const DATE = `0${d.getDate()}`.slice(-2)+"-"+`0${d.getMonth()}`.slice(-2)+"-"+d.getFullYear();
window.onload = () => {
    getStates();
}

const getStates = () => {
    $("#state").append("<option id='loadOptionState'>Please wait fetching states...</option>");
    fetch(BASE+"/v2/admin/location/states")
        .then((res) => {
            res.json()
                .then(data => {
                    const states = data.states;
                    states.map(state => {
                        $("#state").append(
                            `<option value="${state.state_id}">${state.state_name}</option>`
                        );
                    });
                    $("#loadOptionState").remove();
                });
        });
}

const getDistricts = (state) => {
    $("#districtel").html("");
    $("#districtel").append("<option>Select a district</option>");
    $("#districtel").append("<option id='loadOptionDistrict'>Please wait fetching districts...</option>");
    fetch(BASE+"/v2/admin/location/districts/"+state)
        .then((res) => {
            res.json()
                .then(data => {
                    const districts = data.districts;
                    districts.map(district => {
                        $("#districtel").append(
                            `<option value="${district.district_id}">${district.district_name}</option>`
                        );
                    });
                    $("#loadOptionDistrict").remove();
                    $("#stateOptionDistrict").remove();
                });
        });
}

const getSlotsByDistrict = (district) => {
    $("#dataCard").css("display","flex");
    $("#data").html("Please wait, fetching slots...");
    const body = {district_id:district,date:DATE}
    let url = new URL(BASE+"/v2/appointment/sessions/public/calendarByDistrict");
    url.search = new URLSearchParams(body);
    fetch(url)
        .then((res) => {
            res.json()
                .then(data => {
                    const centers = data.centers;
                    fillCenters(centers);
                });
        });
}

const getSlotsByPin = () => {
    const pincode = $("#pinele").val();
    
    if(pincode){
        $("#dataCard").css("display","flex");
        $("#data").html("Please wait, fetching slots...");
        const body = {pincode:pincode,date:DATE}
        let url = new URL(BASE+"/v2/appointment/sessions/public/calendarByPin");
        url.search = new URLSearchParams(body);
        fetch(url)
            .then((res) => {
                res.json()
                    .then(data => {
                        const centers = data.centers;
                        fillCenters(centers);
                    });
            });
    }
    else{
        alert("Pincode can not be empty")
    }
}

const fillCenters = (centers) => {
    Centers = [];
    centers.map(center => {
        let sessions = center.sessions;
        sessions.map(session => {
            if(session.date in Centers){
                Centers[session.date] = [...Centers[session.date],{
                    center:center,
                    name:center.name,
                    age:session.min_age_limit,
                    vaccine:session.vaccine,
                    price:center.fee_type,
                    capacity:session.available_capacity
                }]
            }
            else{
                Centers[session.date] = [{
                    center:center,
                    name:center.name,
                    age:session.min_age_limit,
                    vaccine:session.vaccine,
                    price:center.fee_type,
                    capacity:session.available_capacity
                }];
            }
        });
    });
    addData();
}

const addData = () => {
    $("#data").html("");
    const dates = Object.keys(Centers);
    dates.sort();
    if(dates.length>0){
        dates.map(date => {
            let centers = Centers[date];
            $("#data").append(
                `
                    <a class="page--item  d-flex align-items-center justify-content-between" href="#!" onclick="viewData('${date}')">
                        ${date.trim()}
                        <span class="text-success">${centers.length} centers &nbsp;&nbsp;&nbsp;
                        <i class="fa fa-angle-right"></i></span>
                    </a>
                `
            );
        })
    }
    else{
        $("#data").html("No center found");
    }
}

const viewData = (date) => {
    const centers = Centers[date];
    $("#data").html("");
    $("#data").append(`<a href="#!" onclick="addData();"><i class="fa fa-arrow-left"></i></a>`);
    if(centers.length>0){
        centers.map(center => {
            $("#data").append(`
                <div class="row mt-3">
                    <div class="col-8">
                        <div class="card shadow">
                            <div class="card-body">
                                <h6>${center.name}</h6>
                                <p><i class="fa fa-map-marker"></i> ${center.center.block_name}, ${center.center.pincode}</p>
                                <p class="badge bg-warning">${center.age}+</p>
                                <p>Vaccine: ${center.vaccine} (${center.price})</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow bg-success" style="height:100%">
                            <div class="card-body">
                                <p class="text-center text-light">${center.capacity}</p>
                                <p class="text-center text-light">Capacity</p>
                            </div>
                            <div class="card-footer">
                                <p class="text-center text-light">Book on CoWin</p>
                            </div>
                        </div>
                    </div>
                </div>
            `);
        });
    }
    else{
        $("#data").html("No center found");
    }
}

const filterData = () => {
    const age = $("#age").val();
    const vaccine = $("#vaccine").val();
    const price = $("#price").val();
    let centers = Centers;
    const dates = Object.keys(centers);
    dates.sort();
    console.log(age)
    if(age!=""){
        dates.map(date => {
            centers[date] = centers[date].filter((center) => { return center.age==age})
        });
    }
    if(vaccine!=""){
        dates.map(date => {
            centers[date] = centers[date].filter((center) => { return center.vaccine.toLowerCase()==vaccine.toLowerCase()})
        });
    }
    if(price!=""){
        dates.map(date => {
            centers[date] = centers[date].filter((center) => { return center.price.toLowerCase()==price.toLowerCase()})
        });
    }
    $("#data").html("");
    const datesc = Object.keys(centers);
    datesc.sort();
    if(datesc.length>0){
        datesc.map(date => {
            let centersc = centers[date];
            $("#data").append(
                `
                    <a class="page--item  d-flex align-items-center justify-content-between" href="#!" onclick="viewData('${date}')">
                        ${date.trim()}
                        <span class="text-success">${centersc.length} centers &nbsp;&nbsp;&nbsp;
                        <i class="fa fa-angle-right"></i></span>
                    </a>
                `
            );
        })
    }
    else{
        $("#data").html("No center found");
    }
}