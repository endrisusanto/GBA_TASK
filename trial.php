<!DOCTYPE html>
<html>
<head>
    <title>Dropdown dan Checkbox</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <h2>Pilih opsi:</h2>
    <select id="optionsDropdown" onchange="toggleCheckbox()">
        <option value="smr">smr</option>
        <option value="normal">normal</option>
        <option value="simple">simple</option>
        <option value="regular">regular</option>
    </select>
    
    <h2>Checkbox:</h2>
    <label for="cts" id="labelcts" >CTS</label>
    <input type="checkbox" id="cts">
    <label for="gts" id="labelgts">GTS</label>
    <input type="checkbox" id="gts">
    <label for="ctsv" id="labelctsv">CTSV</label>
    <input type="checkbox" id="ctsv">
    <label for="gtsv" id="labelgtsv">gtsv</label>
    <input type="checkbox" id="gtsv">
    <label for="bvt" id="labelbvt">bvt</label>
    <input type="checkbox" id="bvt">
    <label for="getprop" id="labelgetprop">getprop</label>
    <input type="checkbox" id="getprop">
    <label for="sdt" id="labelsdt">sdt</label>
    <input type="checkbox" id="sdt">
    <label for="svt" id="labelsvt">svt</label>
    <input type="checkbox" id="svt">
    <label for="bootimage" id="labelbootimage">bootimage</label>
    <input type="checkbox" id="bootimage">
    <label for="scat" id="labelscat">scat</label>
    <input type="checkbox" id="scat">
    <label for="sts" id="labelsts">sts</label>
    <input type="checkbox" id="sts">
    
    
    <script>
        function toggleCheckbox() {
            var dropdown = document.getElementById("optionsDropdown");
            var selectedOption = dropdown.value;
            
            var cts = document.getElementById("cts"); // Ubah ID sesuai checkbox yang ingin disembunyikan
            var gts = document.getElementById("gts"); // Ubah ID sesuai checkbox yang ingin disembunyikan
            var ctsv = document.getElementById("ctsv"); // Ubah ID sesuai checkbox yang ingin disembunyikan
            var gtsv = document.getElementById("gtsv"); // Ubah ID sesuai checkbox yang ingin disembunyikan
            var bvt = document.getElementById("bvt"); // Ubah ID sesuai checkbox yang ingin disembunyikan
            var getprop = document.getElementById("getprop"); // Ubah ID sesuai checkbox yang ingin disembunyikan
            var sdt = document.getElementById("sdt"); // Ubah ID sesuai checkbox yang ingin disembunyikan
            var svt = document.getElementById("svt"); // Ubah ID sesuai checkbox yang ingin disembunyikan
            var bootimage = document.getElementById("bootimage"); // Ubah ID sesuai checkbox yang ingin disembunyikan
            var scat = document.getElementById("scat"); // Ubah ID sesuai checkbox yang ingin disembunyikan
            var sts = document.getElementById("sts"); // Ubah ID sesuai checkbox yang ingin disembunyikan
            
            
            if (dropdown === "smr") {
            	cts.classList.remove("hidden");
                gts.classList.remove("hidden");
                sts.classList.add("hidden");
                scat.classList.add("hidden");
                ctsv.classList.remove("hidden");
                gtsv.classList.remove("hidden");
                bvt.classList.remove("hidden");
                getprop.classList.remove("hidden");
                sdt.classList.remove("hidden");
                svt.classList.remove("hidden");
                bootimage.classList.remove("hidden");
                
                labelcts.classList.remove("hidden");
                labelgts.classList.remove("hidden");
                labelsts.classList.add("hidden");
                labelscat.classList.add("hidden");
                labelctsv.classList.remove("hidden");
                labelgtsv.classList.remove("hidden");
                labelbvt.classList.remove("hidden");
                labelgetprop.classList.remove("hidden");
                labelsdt.classList.remove("hidden");
                labelsvt.classList.remove("hidden");
                labelbootimage.classList.remove("hidden");
            }
            else if (selectedOption === "normal") {
            	cts.classList.remove("hidden");
                gts.classList.remove("hidden");
                sts.classList.add("hidden");
                scat.classList.add("hidden");
                ctsv.classList.remove("hidden");
                gtsv.classList.remove("hidden");
                bvt.classList.remove("hidden");
                getprop.classList.remove("hidden");
                sdt.classList.remove("hidden");
                svt.classList.remove("hidden");
                bootimage.classList.remove("hidden");
                
                labelcts.classList.remove("hidden");
                labelgts.classList.remove("hidden");
                labelsts.classList.add("hidden");
                labelscat.classList.add("hidden");
                labelctsv.classList.remove("hidden");
                labelgtsv.classList.remove("hidden");
                labelbvt.classList.remove("hidden");
                labelgetprop.classList.remove("hidden");
                labelsdt.classList.remove("hidden");
                labelsvt.classList.remove("hidden");
                labelbootimage.classList.remove("hidden");
            } else if (selectedOption === "smr") {
            	cts.classList.remove("hidden");
                gts.classList.remove("hidden");
            	sts.classList.remove("hidden");
                scat.classList.remove("hidden");
                ctsv.classList.add("hidden");
                gtsv.classList.add("hidden");
                bvt.classList.add("hidden");
                getprop.classList.add("hidden");
                sdt.classList.add("hidden");
                svt.classList.add("hidden");
                bootimage.classList.add("hidden");
                
                labelcts.classList.remove("hidden");
                labelgts.classList.remove("hidden");
            	labelsts.classList.remove("hidden");
                labelscat.classList.remove("hidden");
                labelctsv.classList.add("hidden");
                labelgtsv.classList.add("hidden");
                labelbvt.classList.add("hidden");
                labelgetprop.classList.add("hidden");
                labelsdt.classList.add("hidden");
                labelsvt.classList.add("hidden");
                labelbootimage.classList.add("hidden");
            } else if (selectedOption === "simple") {
            	cts.classList.add("hidden");
                gts.classList.add("hidden");
            	sts.classList.remove("hidden");
                scat.classList.add("hidden");
                ctsv.classList.add("hidden");
                gtsv.classList.add("hidden");
                bvt.classList.add("hidden");
                getprop.classList.add("hidden");
                sdt.classList.add("hidden");
                svt.classList.add("hidden");
                bootimage.classList.add("hidden");
                
                
              	labelcts.classList.add("hidden");
                labelgts.classList.add("hidden");
            	labelsts.classList.remove("hidden");
                labelscat.classList.add("hidden");
                labelctsv.classList.add("hidden");
                labelgtsv.classList.add("hidden");
                labelbvt.classList.add("hidden");
                labelgetprop.classList.add("hidden");
                labelsdt.classList.add("hidden");
                labelsvt.classList.add("hidden");
                labelbootimage.classList.add("hidden");
            }else if (selectedOption === "regular") {            
            	cts.classList.remove("hidden");
                gts.classList.remove("hidden");
            	sts.classList.remove("hidden");
                scat.classList.remove("hidden");
                ctsv.classList.remove("hidden");
                gtsv.classList.remove("hidden");
                bvt.classList.remove("hidden");
                getprop.classList.remove("hidden");
                sdt.classList.remove("hidden");
                svt.classList.remove("hidden");
                bootimage.classList.remove("hidden");
                
                labelcts.classList.remove("hidden");
                labelgts.classList.remove("hidden");
            	labelsts.classList.remove("hidden");
                labelscat.classList.remove("hidden");
                labelctsv.classList.remove("hidden");
                labelgtsv.classList.remove("hidden");
                labelbvt.classList.remove("hidden");
                labelgetprop.classList.remove("hidden");
                labelsdt.classList.remove("hidden");
                labelsvt.classList.remove("hidden");
                labelbootimage.classList.remove("hidden");
            }
        }
    </script>
</body>
</html>
