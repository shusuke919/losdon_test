import React from 'react';

import Box from '@mui/material/Box';
import TextField from '@mui/material/TextField';


import Button from '@mui/material/Button';
import Stack from '@mui/material/Stack';

function Home() {
    return (
      <div className="container">
     
         
         {/* 検索フォーム */}
         <Stack spacing={2} direction="row">
          <Box sx={{ justify: 'center', marginTop: '15px', width: 500,maxWidth: '100%',}} >
             <TextField fullWidth label="品名を入力してください" id="fullWidth" />
             
          </Box>
          <Button  color="primary" variant="contained"　href={`/example`}>検索</Button>
             
                 
                 
                  </Stack>
             
        
      
  </div>
    );
}

export default Home;
