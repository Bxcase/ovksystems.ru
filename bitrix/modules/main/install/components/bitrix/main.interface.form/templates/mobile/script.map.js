{"version":3,"file":"script.min.js","sources":["script.js"],"names":["BX","window","BXMobileApp","namespace","repo","formId","gridId","initSelect","d","select","eventNode","container","this","click","delegate","callback","init","prototype","multiple","titles","values","defaultTitles","hasAttribute","setAttribute","addCustomEvent","initValues","bind","ii","options","length","push","innerHTML","value","e","show","PreventDefault","UI","SelectPicker","multiselect","default_value","data","keys","jj","html","removeAttribute","util","in_array","message","onCustomEvent","initDatetime","node","type","formats","parentNode","format","inner","datetime","time","date","bitrix","visible","eventCancelBubble","res","start_date","getStrDate","DatePicker","setParams","makeDate","text","clone","isNotEmptyString","getAttribute","delButton","style","display","str","Date","dateR","RegExp","timeR","m","test","exec","setDate","setMonth","setFullYear","setHours","setMinutes","parseDate","str_pad_left","getDate","toString","getMonth","getFullYear","getHours","getMinutes","DATETIME_FORMAT","convertBitrixFormat","DATE_FORMAT","TIME_FORMAT","substr","trim","indexOf","replace","id","proxy","drop","initSelectUser","showDrop","urls","list","profile","actualizeNodes","expand","visCount","FastClick","attach","showMenu","Table","url","table_settings","markmode","return_full_mode","skipSpecialChars","modal","alphabet_index","outsection","okname","cancelname","proxy_context","remove","findParent","tagName","className","buildNodes","items","c","user","existedUsers","Math","min","join","ij","f","childNodes","setTimeout","a_users","initSelectGroup","superclass","constructor","apply","arguments","extend","b_groups","initText","app","attachButton","attachFileSettings","attachedFiles","extraData","mentionButton","smileButton","htmlspecialcharsback","okButton","name","cancelButton","htmlspecialchars","initBox","label","change","initFile","dialogName","controlName","uploadParams","uploadMethod","uploadFileUrl","allowUpload","allowUploadExt","maxCount","button","agent","Uploader","getInstance","streams","uploadFormData","showImage","sortItems","input","dropZone","placeHolder","queueFields","thumb","fields","template","preview","params","width","height","hasClass","DoNothing","buttons","title","takePhoto","quality","source","correctOrientation","targetWidth","targetHeight","destinationType","handleAppFile","ActionSheet","image","dataBlob","UploaderUtils","dataURLToBlob","onChange","_onFileIsBound","onFileIsBound","_onFileIsAppended","onFileIsAppended","_onUploadStart","onUploadStart","_onUploadProgress","onUploadProgress","_onUploadDone","onUploadDone","_onUploadError","onUploadError","onFileIsCreated","findChildren","ar1","ar2","findChild","onAttach","onAttachFiles","onQueueIsChanged","getItems","addClass","removeClass","files","error","deleteFile","getFirst","pop","acceptableL","file","size","getFormattedSize","item","bindFile","getItem","action","progress","result","n","findChildByClassName","inp","create","attrs","appendChild","del","hide","Mobile","Grid","Form","Page","LoadingScreen","nodes","obj","ff","o","i","restrictedMode","bindElement","elements","cancel","TopBar","updateButtons","bar_type","position","ok","tag","toLowerCase","event","keyCode","found","form","focus","Disk","UFMobile","getByName","save","submit","ajax","restricted","method","onsuccess","onfailure","onprogress","submitAjax","getByFormId","getByGridId"],"mappings":"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"}