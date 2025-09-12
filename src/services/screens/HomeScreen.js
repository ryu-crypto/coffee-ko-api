import React, {useEffect, useState} from 'react';
import { View, Text, FlatList, TouchableOpacity, Image } from 'react-native';
import API from '../services/api';


export default function HomeScreen({navigation}){
const [products, setProducts] = useState([]);
useEffect(()=>{
API.get('/products').then(res => setProducts(res.data.data || res.data));
},[]);


return (
<View style={{flex:1, padding:16}}>
<FlatList
data={products}
keyExtractor={(item)=>item.id.toString()}
renderItem={({item})=> (
<TouchableOpacity onPress={()=>navigation.navigate('ProductDetails',{id:item.id})} style={{marginBottom:12}}>
<Image source={{uri: `http://10.0.2.2:8000/storage/${item.image}`}} style={{width:'100%',height:160,borderRadius:8}} />
<Text>{item.name}</Text>
<Text>₱{item.price}</Text>
</TouchableOpacity>
)}
/>
</View>
)
}