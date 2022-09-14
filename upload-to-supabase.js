//URL and KEY
const SUPABASE_URL = //SUPABASE_URL
const SUPABASE_ANON_KEY = //SUPABASE_ANON_KEY


const _supabase = supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY)

//Get the selected file that is in the folder 
async function insertFile(path, name) {
    
    const response = await fetch(path+name);
    const blob = await response.blob();

    const { data, error } = await _supabase.storage
    .from('storage-files')
    .upload(name, blob)

    if(!error) {
        console.log("Sent");
        //Only Images
        var image_element=document.createElement("img");
        image_element.src = path+name;
        document.body.appendChild(image_element); 
    }
    else{
        console.log(error);
    }
}



