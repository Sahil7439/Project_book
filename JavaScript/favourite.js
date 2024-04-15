function AddToFavorites(siteTitle, siteURL)  
{  
    if (window.sidebar)  
    {  
        window.sidebar.addPanel(siteTitle, siteURL,"");  
    }  
    else if(document.all)  
    {  
        window.external.AddFavorite(siteURL, siteTitle);  
    }  
    else if(window.opera && window.print)  
    {  
        return true;  
    }  
} 