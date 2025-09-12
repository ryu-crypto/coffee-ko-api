import React, {useEffect, useState} from 'react';
import { View, Text, Image, Button } from 'react-native';
import API from '../services/api';


export default function ProductDetailsScreen({route, navigation}){
const { id } = route.params;
const [product, setProduct] = useState(null);
useEffect(()=>{
API.get(`/products/${id}`).then(res => setProduct(res.data));
},[]);


if(!product) return <Text>Loading...</Text>;


return (
<View style={{flex:1, padding:16}}>
<Image source={{uri:`http://10.0.2.2:8000/storage/${product.image}`}} style={{width:'100%',height:240}} />
<Text>{product.name}</Text>
<Text>{product.description}</Text>
<Text>₱{product.price}</Text>
<Button title="Add to cart" onPress={()=>{/* implement cart */}} />
</View>
)
}